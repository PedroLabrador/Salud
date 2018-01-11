@extends ('layouts.app')

@section('content')

    <div class="row" style='margin-top: 3em;'>
        <h1>{{ $user->name }}</h1>
        <p>Type: @if ($user->status == 'P') Patient @else Nurse @endif</p>
        <p>User: {{ $user->username }}</p>
        <p>{{ $user->email }}</p>

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
