<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $posts = Post::latest()->paginate(10);
        return view('welcome', [
            'posts' => $posts,
        ]);
    }
    public function dashboard() {
        return view('dashboard');
    }
}
