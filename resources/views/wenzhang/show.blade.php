@extends('layout.default')
@section('contents')
    <ul>
        <li>{{ $wenzhang->title }}</li>
        <li>{{ $wenzhang->content }}</li>
        <li>{{ $wenzhang->cateid }}</li>
        <li>{{ $wenzhang->author }}</li>
    </ul>
@endsection
