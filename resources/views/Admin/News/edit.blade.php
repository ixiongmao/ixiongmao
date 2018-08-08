@extends('Admin.common')

@section('AD2_title', '快报修改')

@section('Left_Nav')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">@yield('AD2_title')</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="/admin/news/update/{{ $data['id']}}" method="post">
                              {{ csrf_field() }}
                              @if (session('Error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ session('Error') }}
                                  </div>
                              @endif
                              <div class="form-group">
                                <label>状态</label>
                                <label class="radio-inline">
                                    <input type="radio" name="news_status" value="0" @if ($data['news_status'] == 0) checked @endif>隐藏</label>
                                <label class="radio-inline">
                                    <input type="radio" name="news_status" value="1" @if ($data['news_status'] == 1) checked @endif>显示</label></div>
                              <div class="form-group input-group">
                                  <span class="input-group-addon">快报标题</span>
                                  <input type="text" class="form-control" name="news_name" value="{{ $data['news_name'] }}" placeholder="请输入文章标题">
                              </div>
                              <div class="form-group input-group">
                                  <span class="input-group-addon">快报内容</span>
                                  <textarea name="news_content" id="d_content" class="form-control">{{ $data['news_content'] }}</textarea>
                              </div>
                                <input type="submit" class="btn btn-primary" value="提交">
                                <input type="reset" class="btn btn-default" value="重置">
                              </form>
                        </div>
                        <!-- /.col-lg-6 (nested) --></div>
                    <!-- /.row (nested) --></div>
                <!-- /.panel-body --></div>
            <!-- /.panel --></div>
        <!-- /.col-lg-12 --></div>
    <!-- /.row -->
@endsection
