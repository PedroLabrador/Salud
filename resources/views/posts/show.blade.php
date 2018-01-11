@extends ('layouts.app')

@section ('content')

    <div class="row" style='margin-top: 3em;'>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <small><p class="text-muted">Posted by: <a href="/users/{{ $post->user->username }}">{{ $post->author }}</a></p></small>
        <small><p class="text-muted">{{ $post->created_at }}</p></small>
    </div>
    <div class="row" style="margin: 1em;">

        @if (Auth::user()->status == 'N')
            @if ($post->hasApplied(Auth::user()))
                <form class="" action="/posts/{{$post->id}}/unapply" method="post">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger" name="" value="Remove Apply">
                </form>
            @else
                <form class="" action="/posts/{{$post->id}}/apply" method="post">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" name="" value="Apply">
                </form>
            @endif
        @endif

        @forelse ($post->applies as $user)
            <li>{{ $user->name }} applied for this job. <a class="badge" href="/users/{{ $user->username }}">{{ $user->voted->count() }} Votes</a></li>
        @empty
            no users have applied for this job
        @endforelse
    </div>

@endsection
