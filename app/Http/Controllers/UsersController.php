<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($username) {
        $user = User::where('username', $username)->first();
        //$posts = Post::all()->where('user_id', $user->id);

        //Makes use of User model with a public function that return hasMany values for user posts
        //$posts = $user->posts;
        return view('users.show', [
            'user' => $user,
            //'posts' => $posts,
        ]);
    }

    public function vote($username, Request $request) {
        $user = User::where('username', $username)->first();
        $me = $request->user();

        //Makes use of votes function of the user model
        $me->votes()->attach($user);
        return redirect("/users/$username")->withSuccess('Voted for this nurse!');
    }

    public function unvote($username, Request $request) {
        $user = User::where('username', $username)->first();
        $me = $request->user();

        //Makes use of votes function of the user model
        $me->votes()->detach($user);
        return redirect("/users/$username")->withSuccess('Removed vote for this nurse!');
    }

    public function votes($username) {
        $user = User::where('username', $username)->first();

        return view('users.votes', [
            'user' => $user,
        ]);
    }
}
