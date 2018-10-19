@extends('layout.default')
@section('contents')
    <h1>{{ $post->title }}</h1>
    <h1>{{ $post->authorid }}</h1>
    <h1>{{ $post->content }}</h1>
@stop
