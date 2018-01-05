@extends ('layouts.app')

@section ('content')

    <div class="jumbotron text-center">
        <h1>HealthCare</h1>
        <nav class="navbar">
            <ul class="nav navbar-nav">
                <li><a class="nav-link" href="/">Home</a></li>
            </ul>
        </nav>
    </div>
    <div class="row" style="width:60%; margin: 0 auto;">
        @forelse ($posts as $post)
            <div class="col-xs-12" style="margin-bottom: 2em;">
                <p class="text-primary">Posted by: <a class="text-info" href="#">{{ $post->author }}</a></p>
                <p class="text-muted">{{ $post->content }}</p>
                <a class="text-info" href="/posts/{{ $post->id }}">Read more:</a>
            </div>
        @empty
            <p>No posts available</p>
        @endforelse
    </div>


@endsection
