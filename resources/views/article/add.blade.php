@extends('layout.default')
@section('contents')
    <form action="{{route('article/save')}}" method="post">
        <div class="form-group">
            <label for="">标题:</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="">内容:</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        {{csrf_field()}}
        <button class="btn btn-default">提交</button>
    </form>
@endsection

