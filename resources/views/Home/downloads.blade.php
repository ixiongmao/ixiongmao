@extends('Home.common')

@section('Home_title', '文件下载')

@section('Left_Nav')
    @parent
@endsection

@section('content')
<div class="breadcrumbs">
      <div class="container">
        <a href="/">首页</a>
        <code>&gt;</code>
        <a href="/downloads">文件下载</a></div>
    </div>
<div style="width:100%;text-align:center;">
  <table class="layui-table"  style=" display:inline-block; width:1122px;">
    <thead>
      <tr>
        <th>名称</th>
        <th>更新时间</th>
        <th>下载</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($Downloads as $k=>$v)
      <tr>
        <td style="width:374px;">{{ $v['qudong_name'] }}</td>
        <td style="width:374px;">{{ date('Y-m-d H:i:s',$v['qudong_time']) }}</td>
        <td style="width:374px;"><a href="{{ $v['qudong_files'] }}"><i class="layui-icon layui-icon-download-circle" style="font-size: 30px; color: #1E9FFF;"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
