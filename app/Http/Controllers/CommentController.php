<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Notifications\NewComment;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller {
    // Store comment data
    public function store(Request $request) {
        // Get post and user
        $post = Post::find($request->post_id);
        $author = User::find($post->user);

        // Validate the fields
        $formFields = $request->validate([
            "post_id" => ["required"],
            "content" => ["required"],
        ]);

        // Add author name and make the comment not approved
        $formFields["author"] =  auth()->check() ? auth()->user()->name : 'guest';
        $formFields["approved"] = false;

        Comment::create($formFields);

        // Send user notification
        Notification::send($author, new NewComment($post->title, $request->post_id));

        return back()->with('message', 'Comment added succesfully! Waiting for approval.');
    }

    // Approve comment
    public function approve(Comment $comment) {
        $comment->approved = true;
        $comment->save();

        return back()->with("message", "Comment approved successfully!");
    }

    // Delete comment
    public function destroy(Comment $comment) {
        if ($comment) {
            $comment->delete();
            return back()->with("message", "Comment deleted successfully!");
        } else {
            return back()->with("message", "Comment not found!");
        }
    }
}
