@extends('layout.default')
@section('contents')
    <form action="{{ route('goods.update',[$good]) }}" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="">商品名称</label>
            <input type="text" name="goodsname" value="{{ $good->goodsname }}">
        </div>
        <div class="form-group">
            <label for="">商品编号</label>
            <input type="text" name="sn" value="{{ $good->sn }}">
        </div>
        <div class="form-group">
            <label for="">商品库存</label>
            <input type="text" name="num" value="{{ $good->num }}">
        </div>
        <div class="form-group">
            <label for="">商品图片</label>
            <input type="file" name="conver">
            <img src="{{ \Illuminate\Support\Facades\Storage::url($good->conver) }}" alt="">
        </div>
        {{csrf_field()}}
        {{method_field('PUT')}}
        <button class="btn btn-info">提交</button>
    </form>
@endsection

