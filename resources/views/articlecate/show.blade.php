@extends('layout.default')
@section('contents')
    <ul>
        <li>{{ $articlecate->title }}</li>
        <li>{{ $articlecate->desc }}</li>
    </ul>
@stop

