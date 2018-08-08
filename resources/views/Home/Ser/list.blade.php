@extends('Home.common')

@section('Home_title','服务标准')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href="/">首页</a>
            <code>&gt;</code>
            <a href="/service_standard">服务标准</a></div>
        <style type="text/css">.ser img{ width: 100%; }</style>
        @foreach ($data as $v)
          @if ($v['service_status'] == 1)
        <div class="container ser">
            <h1 style="text-align: center;margin-top: 35px;">{{$v['service_title']}}</h1>
            <div class="fengexian" style="border:1px dashed #CCC;margin: 10px 0px 15px 0px;"></div>
            <div>{!!$v['service_content']!!}</div>
        </div>
          @endif
        @endforeach
@endsection
