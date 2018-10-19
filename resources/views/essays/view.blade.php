@extends('layout.default')
@section('contents')
    <ul>
        <li>{{ $essay->title  }}</li>
        <li>{{ $essay->author  }}</li>
        <li>{{ $essay->content  }}</li>
        <li>{{ $essay->created_at  }}</li>
    </ul>
@endsection
