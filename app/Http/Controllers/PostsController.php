<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
    public function create(Request $request) {
        $this->validate($request, [
            'post_info' => ['required', 'max:255'],
        ], [
            'post_info.required' => 'Por favor el campo no debe estar vacio',
            'post_info.max'      => 'El campo no debe tener mas de 255 caracteres',
        ]);

        $post = Post::create([
            'content' => $request->input('post_info'),
            'author'  => 'Default',
        ]);

        return redirect('/posts/'.$post->id);

    }
}
