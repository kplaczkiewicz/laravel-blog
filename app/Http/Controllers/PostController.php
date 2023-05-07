<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller {
    // Show all post
    public function index() {
        $posts = Post::latest()
                ->filter(request(["tag", "category", "search"]))
                ->get();

        return view("posts.index", [
            "posts" => $posts
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
        return view("posts.create");
    }

     // Store post data
     public function store(Request $request) {
        $request->merge([
            'category' => 'laravel',
            'tags' => 'laravel, frontend, backend',
            'image_url' => 'img',
        ]);

        $formFields =$request->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'intro_text' => 'required',
            'content' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'image_url' => 'required',
        ]);

        Post::create($formFields);

        return redirect('/');
    }
}
