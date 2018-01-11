@extends ('layouts.app')

@section ('content')

    <div class="row" style="width:60%; margin: 5em auto;">
        <form action="/posts/create" method="post">
            {{ csrf_field() }}
            <div class="form-group @if ($errors->has('post_info')) has-danger @endif">
                <div class="row">
                    <label for="title">Title</label>
                    <input id="title" class="form-control" type="text" name="title" placeholder="" required>
                </div>
                <div class="row" style="margin-bottom: 1em">
                    <label for="post_info">Description</label>
                    <textarea id="post_info" class="form-control" style="background-color: white;" name="post_info" rows="8" cols="80" placeholder="Please tell us, what do you need"></textarea>
                </div>
                <div class="row">
                    <input class="btn btn-primary" type="submit" name="send" value="Submit">
                    @if ($errors->has('post_info'))
                        @foreach ($errors->get('post_info') as $error)
                            <div class="form-control" style="border-color: #FF4136; color: #FF4136;">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </form>
    </div>

@endsection
