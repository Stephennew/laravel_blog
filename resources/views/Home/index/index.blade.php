@extends('layout.default')
@section('contents')
    <h1>前台</h1>
    <table class="table table-bordered">
        <tr>
            <td>文章标题</td>
            <td>文章作者</td>
            <td>文章内容</td>
        </tr>
        @foreach($list as $v)
            <tr>
                <td><a href="{{ route('index.view',[$v]) }}">{{$v->title}}</a></td>
                <td>{{$v->authorid}}</td>
                <td>{{$v->content}}</td>
            </tr>
        @endforeach
    </table>
@endsection
