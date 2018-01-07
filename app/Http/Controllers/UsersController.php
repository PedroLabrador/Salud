<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($username) {
        $user = User::where('username', $username)->first();
        $posts = Post::all()->where('user_id', $user->id);
        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
