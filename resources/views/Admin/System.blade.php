@extends('Admin.common')

@section('AD2_title', '网站配置')

@section('Left_Nav')
    @parent
@endsection

@section('content')
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">@yield('AD2_title')</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                  <form action="/admin/system/update/1" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (session('Success'))
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session('Success') }}</div>
                    @endif
                    @if (session('Error'))
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session('Error') }}</div>
                    @endif
                    <div class="form-group">
                      <label>网站状态</label>
                      <label class="radio-inline">
                        <input type="radio" name="system_status" value="0" @if ($data[ 'system_status']==0 ) checked @endif>关闭</label>
                      <label class="radio-inline">
                        <input type="radio" name="system_status" value="1" @if ($data[ 'system_status']==1 ) checked @endif>开启</label></div>
                    <div class="form-group input-group">
                      <span class="input-group-addon">网站标题</span>
                      <input type="text" class="form-control" name="system_name" value="{{ $data['system_name'] }}" placeholder="请输入网站标题"></div>
                    <div class="form-group input-group">
                      <span class="input-group-addon">网站关键字</span>
                      <input type="text" class="form-control" name="system_keywords" value="{{ $data['system_keywords'] }}" placeholder="请输入网站关键字" /></div>
                    <div class="form-group input-group">
                      <span class="input-group-addon">网站描述</span>
                      <input type="text" class="form-control" name="system_description" value="{{ $data['system_description'] }}" placeholder="请输入网站描述"></div>
                    <div class="form-group input-group">
                      <span class="input-group-addon">官方网址</span>
                      <input type="text" class="form-control" name="system_site_url" value="{{ $data['system_site_url'] }}" placeholder="请输入官方网址"></div>                    
                    <div class="form-group input-group">
                      <span class="input-group-addon">网站LOGO(点击文本框进行上传)</span>
                      <input type="text" id="picture" class="form-control" value="{{ $data['system_logo'] }}" name="system_logo" /></div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">客服微信</button></span>
                          <input type="text" class="form-control" name="system_weixin" value="{{ $data['system_weixin'] }}" placeholder="请输入客服微信"></div>
                        <!-- /input-group --></div>
                      <!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">客服QQ</button></span>
                          <input type="text" class="form-control" name="system_qq" value="{{ $data['system_qq'] }}" placeholder="请输入客服QQ"></div>
                        <!-- /input-group --></div>
                      <!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <br>
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">客服电话</button></span>
                          <input type="text" class="form-control" name="system_phone" value="{{ $data['system_phone'] }}" placeholder="请输入客服电话"></div>
                        <!-- /input-group --></div>
                      <!-- /.col-lg-6 --></div>
                    <!-- /.row -->
                    <div class="form-group">
                      <label>介绍</label>
                      <textarea class="form-control" rows="3" name="system_copyright" style="display: block;height: 170px;">{{ $data['system_copyright'] }}</textarea></div>
                    <input type="submit" class="btn btn-primary" value="提交" id="submit">
                    <input type="reset" class="btn btn-default" value="重置"></form>
                </div>
                <!-- /.col-lg-6 (nested) --></div>
              <!-- /.row (nested) --></div>
            <!-- /.panel-body --></div>
          <!-- /.panel --></div>
        <!-- /.col-lg-12 --></div>
      <!-- /.row -->
@endsection
