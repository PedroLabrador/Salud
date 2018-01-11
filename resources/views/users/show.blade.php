@extends ('layouts.app')

@section('content')

    <div class="row" style='margin-top: 3em;'>
        <h1>{{ $user->name }}</h1>
        <p>Type: @if ($user->status == 'P') Patient @else Nurse @endif</p>
        <p>User: {{ $user->username }}</p>
        <p>{{ $user->email }}</p>
        <a href="/users/{{ $user->username }}/votes">{{ $user->voted->count() }} voted for this nurse</a>

        @if (Auth::check())
            @if (Auth::user()->hasVoted($user))
                <form action="/users/{{ $user->username }}/unvote" method="post">
                    {{ csrf_field() }}
                    @if (session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                    <button class="btn btn-danger">Remove your vote :(!</button>
                </form>
            @else
                @if ($user->status == 'N')
                    <form action="/users/{{ $user->username }}/vote" method="post">
                        {{ csrf_field() }}
                        @if (session('success'))
                            <span class="text-danger">{{ session('success') }}</span>
                        @endif
                        <button class="btn btn-primary">Vote!!</button>
                    </form>
                @endif
            @endif
        @endif
        <small><p class="text-muted">{{ $user->created_at }}</p></small>
    </div>

    <div class="row" style="width:60%; margin: 0 auto;">
        @forelse ($user->posts as $post)
            <div class="col-xs-12" style="margin-bottom: 2em;">
                <p class="text-muted">{{ $post->content }}</p>
                <p class="text-info" >{{ $post->created_at }}</p>
            </div>
        @empty
            <p>No posts available</p>
        @endforelse
    </div>

@endsection
