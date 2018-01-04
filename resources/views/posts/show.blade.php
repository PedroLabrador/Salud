@extends ('layouts.app')

@section ('content')

    <div class="row" style='margin-top: 3em;'>
        <h1>Post {{ $post->id }}</h1>
        <p> {{$post->content}} </p>
        <small><p class="text-muted">Posted by: <a href="#">{{ $post->author }}</a></p></small>
        <small><p class="text-muted">{{ $post->created_at }}</p></small>
    </div>

@endsection
