<?php

namespace App\Http\Controllers;

use App\Post;
use App\Patient;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
    public function create(Request $request) {

        $user = $request->user();

        $this->validate($request, [
            'post_info' => ['required', 'max:255'],
            'title'     => ['required'],
        ], [
            'post_info.required' => 'Por favor el campo no debe estar vacio',
            'post_info.max'      => 'El campo no debe tener mas de 255 caracteres',
            'title.required'     => 'Por favor el campo no debe estar vacio',
        ]);

        $post = Post::create([
            'user_id' => $user->id,
            'title'   => $request->input('title'),
            'content' => $request->input('post_info'),
            'author'  => $user->name,
        ]);

        /*$patient = Patient::find($user->id);
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');

        $patient->save();*/

        return redirect('/posts/'.$post->id);
    }
}
