@extends('layout.default')
@section('contents')
    <h1>{{ $good->username }}</h1>
    <h1>{{ $good->sn }}</h1>
    <h1>{{ $good->num }}</h1>
    <img src="{{ \Illuminate\Support\Facades\Storage::url($good->conver) }}" alt="">
@endsection
