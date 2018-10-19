@extends('layout.default')
@section('contents')
    <form action="{{route('save')}}" method="post">
        <div class="form-group">
            <label for="">姓名：</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="">电话：</label>
            <input type="text" class="form-control" name="telphone">
        </div>
        <div class="form-group">
            <label for="">email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="">身份证</label>
            <input type="text" class="form-control" name="card">
        </div>
        <div class="form-group">
            <label for="">个性签名</label>
            <input type="text" class="form-control" name="signature">
        </div>
        <div class="form-group">
            <label for="">简介</label>
            <textarea name="intro" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        {{csrf_field()}}{{--阻止跨站请求攻击--}}
        <button class="btn btn-info">提交</button>
    </form>
@stop
