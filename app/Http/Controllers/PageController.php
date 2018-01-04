<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $posts = Post::all();
        return view('welcome', [
            'posts' => $posts,
        ]);
    }

    public function about() {
        return view('about');
    }
}
