@extends('Admin.common')

@section('AD2_title', '轮播图修改')

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
                        <div class="col-lg-12">
                            <form action="/admin/banner/update/{{ $data['id']}}" method="post" id="isForm">{{ csrf_field() }} @if (session('Error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session('Error') }}</div>@endif
                                <div class="form-group">
                                    <label>状态</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="b_status" value="0" @if ($data['banner_status'] == 0 ) checked @endif>隐藏</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="b_status" value="1" @if ($data['banner_status'] == 1 ) checked @endif>显示</label></div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">幻灯片名</span>
                                    <input type="text" class="form-control" name="b_name" value="{{ $data['banner_name'] }}" placeholder="请输入幻灯片名"></div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">幻灯片地址</span>
                                    <input type="text" class="form-control" name="b_url" value="{{ $data['banner_url'] }}" placeholder="请输入幻灯片地址"></div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">幻灯片图片(点击文本框进行上传)</span>
                                    <input type="text" name="b_pic" id="picture" class="form-control" value="{{ $data['banner_pic'] }}" /></div>
                                <input type="submit" class="btn btn-primary" value="提交">
                                <input type="reset" class="btn btn-default" value="重置"></form>
                        </div>
                        <!-- /.col-lg-6 (nested) --></div>
                    <!-- /.row (nested) --></div>
                <!-- /.panel-body --></div>
            <!-- /.panel --></div>
        <!-- /.col-lg-12 --></div>
    <!-- /.row -->
@endsection
