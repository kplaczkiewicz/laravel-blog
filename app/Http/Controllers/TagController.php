<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller {
    // Store tag data
    public function store(Request $request) {
        // Validate the fields
        $formFields = $request->validate([
            "name" => ["required", Rule::unique("tags", "name")],
        ]);

        Tag::create($formFields);

        return redirect(route("posts.create"))->with("message", "Tag added succefully!");
    }
}
