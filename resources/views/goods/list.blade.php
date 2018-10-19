@extends('layout.default')
@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>商品名称</td>
            <td>商品编号</td>
            <td>商品库存</td>
            <td>商品图片</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{ $v->goodsname }}</td>
                <td>{{ $v->sn }}</td>
                <td>{{ $v->num }}</td>
                <td><img src="{{ \Illuminate\Support\Facades\Storage::url($v->conver) }}" alt=""></td>
                <td>
                    <a href="{{ route('goods.edit',[$v]) }}">修改</a>
                    <form action="{{ route('goods.destroy',[$v]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-info">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links() }}
@endsection

