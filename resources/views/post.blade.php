@extends('layout')
@section('content')
    <article>
        <h1>{{$post->title}}</h1>
        <div>{{$post->body}}</div>
    </article>
    <h5><a href="/">go back</a></h5>
    @endsection
