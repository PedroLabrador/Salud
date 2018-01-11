<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request) {
        $posts = Post::latest()->paginate(10);
        $user = $request->user();
        return view('welcome', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }
    public function dashboard() {
        return view('dashboard');
    }
}
