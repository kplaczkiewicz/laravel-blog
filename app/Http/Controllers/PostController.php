<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller {
    // Show all post
    public function index() {
        $posts = Post::latest()
            ->filter(request(["tag", "category", "search"]))
            ->with("tags")
            ->get();

        // Change eloquent result to array of names
        $tagNames = array_map(function ($tag) {
            return $tag["name"];
        }, Tag::all(["name"])->reverse()->toArray());

        $catNames = array_map(function ($cat) {
            return $cat["name"];
        }, Category::all(["name"])->reverse()->toArray());

        return view("posts.index", [
            "posts" => $posts,
            "tags" => $tagNames,
            "categories" => $catNames,
        ]);
    }

    // Show single post
    public function show(Post $post) {
        return view("posts.show", [
            "post" => $post,
        ]);
    }

    // Show create form
    public function create() {
        $tags = Tag::all();
        $cats = Category::all();

        return view("posts.create", [
            "tags" => $tags,
            "categories" => $cats
        ]);
    }

    // Store post data
    public function store(Request $request) {
        $request->merge([
            "image_url" => "img",
        ]);

        // Validate the fields
        $formFields = $request->validate([
            "title" => ["required", Rule::unique("posts", "title")],
            "intro_text" => "required",
            "content" => "required",
            "category_id" => "required|exists:categories,id",
            "image_url" => "required",
        ]);

        // Validate the tags
        $request->validate([
            "tags" => "required",
        ]);

        // Store the tags
        $tagIds = [];

        // Retrieve or create a tag
        foreach ($request->tags as $tagName) {
            $tag = Tag::firstOrCreate(["name" => trim($tagName)]);
            $tagIds[] = $tag->id;
        }

        // Create the post
        $post = Post::create($formFields);

        // Associate the post with the corresponding category
        $category = Category::find($formFields['category_id']);
        $post->category()->associate($category);
        $post->save();

        // Add tags to the post
        $post->tags()->sync($tagIds);

        return redirect("/");
    }
}
