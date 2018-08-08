@extends('Home.common')

@section('Home_title', $data['news_name'])

@section('Left_Nav')
    @parent
@endsection

@section('content')
      <div class="breadcrumbs">
          <div class="container">
              <a href="/">首页</a>
              <code>&gt;</code>
              <a href="/news">文章列表</a>
              <code>&gt;</code>
              <a href="/news/{{$data['id']}}">@yield('Home_title')</a></div>
      </div>
      <style type="text/css">
        .news img{
          width: 100%;
        }
      </style>
      <div class="container news">
          <h3 style="text-align: center;margin-top: 35px;">{{ $data['news_name'] }}</h3>
          <div class="fengexian" style="border:1px dashed #CCC;margin: 10px 0px 15px 0px;"></div>
          <div>
              {!! $data['news_content'] !!}
              <p>
                  <br></p>
              <!-- <div style="margin-bottom: 15px;">下一篇:
                  <a href="http://www.leishen.cn/article/246" class="f6">崂山区红十字会雷神科技雨田基金今日正式成立</a>
                  <br>上一篇:
                  <a href="http://www.leishen.cn/article/226" class="f6">争锋八代酷睿，雷神911全系满血上新</a></div> -->
          </div>
      </div>
@endsection
