@extends('layouts.app')

@section('content')
    @foreach ($user->voted as $voted)
        <li>{{ $voted->username }}</li>
    @endforeach
@endsection
