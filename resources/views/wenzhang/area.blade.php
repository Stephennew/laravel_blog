@extends('layout.default')
@section('contents')
    {{--<h1>{{date('Y-m-d',$start).'至'.date('Y-m-d',$end).'共有'.$sum.'条数据'}}</h1>--}}
    <h1>{{$start.'至'.$end.'共有'.$sum.'条数据'}}</h1>
@stop


