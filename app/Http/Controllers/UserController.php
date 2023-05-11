<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    // Show user dashboard
    public function dashboard() {
        return view('user.dashboard', [
            'posts' => auth()->user()->posts()->paginate(10)
        ]);
    }
}
