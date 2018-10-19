@extends('layout.default')

@section('contents')
    <h2>{{ $manager->username }}</h2>
    <h2><img src="{{ \Illuminate\Support\Facades\Storage::url($manager->icon) }}" alt=""></h2>
@endsection