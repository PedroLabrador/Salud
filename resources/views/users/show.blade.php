@extends ('layouts.app')

@section('content')

    <div class="row" style='margin-top: 3em;'>
        <h1>{{ $user->name }}</h1>
        <p>User: {{ $user->username }}</p>
        <p>{{ $user->email }}</p>

        <small><p class="text-muted">{{ $user->created_at }}</p></small>
    </div>

@endsection
