@extends('layout.default')
@section('contents')
    <h2>文章详情</h2>
    <div>
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->authorid }}</p>
        <p>{{ $post->conver }}</p>
        <textarea name="" id="" cols="30" rows="10">{{ $post->content }}</textarea>
    </div>
@endsection


