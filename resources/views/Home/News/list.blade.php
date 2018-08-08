@extends('Home.common')

@section('Home_title', '文章列表')

@section('Left_Nav')
    @parent
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <a href="/">首页</a>
        <code>&gt;</code>
        <a href="/news">@yield('Home_title')</a>
    </div>
</div>
<div style="width:100%;text-align:center;">
    <form action="/news" method="get">
        <div style="width: 500px;height: 50px;margin-left: 590px;">
            <input type="text" name="Search" lay-verify="required" placeholder="请输入关键字" class="layui-input" style="width: 300px;margin-top: 20px;margin-left:108px;">
            <button class="layui-btn" type="submit" style="margin-top: -38px; float: right;background:#b9000f">点击搜索</button></div>
    </form>
    <table class="layui-table" style=" display:inline-block; width:1122px;">
        <thead>
            <tr>
                <th style="width:600px;text-align:center;">文章名称</th>
                <th style="width:600px;text-align:center;">发布时间</th></tr>
        </thead>
        <tbody>
          @foreach ($data as $k=>$v)
            <tr>
                <td style="width:600px;">
                    <a href="/news/{{ $v['id'] }}">{{ $v['news_name'] }}</a></td>
                <td style="width:600px;">{{ date('Y-m-d H:i:s',$v['news_time']) }}</td>
            </tr>
            @endforeach
          </tbody>
    </table>
    <div class="col-sm-6" style="margin-top: -30px;">
        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
            <ul class="pagination">
              {!! $data -> appends(['Search'=>$Search]) -> render() !!}
            </ul>
          </div>
    </div>
</div>
@endsection
