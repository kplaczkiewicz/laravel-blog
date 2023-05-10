<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller {
    // Store category data
    public function store(Request $request) {
        // Validate the fields
        $formFields = $request->validate([
            "name" => ["required", Rule::unique("categories", "name")],
        ]);

        Category::create($formFields);

        return redirect(route("posts.create"))->with("message", "Category added succefully!");
    }
}
