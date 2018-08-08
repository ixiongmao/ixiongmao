@extends('Admin.common')

@section('AD2_title', '友情链接添加')

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
                            <form action="/admin/links/store" method="post">
                              {{ csrf_field() }}
                              @if (session('Error'))
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('Error') }}
                              </div>
                              @endif
                                <div class="form-group input-group">
                                    <span class="input-group-addon">友情链接名</span>
                                    <input type="text" class="form-control" name="links_name" placeholder="请输入友情链接名">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">友情链接地址</span>
                                    <input type="text" class="form-control" name="links_url" placeholder="请输入友情链接地址">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">友情链接图片(点击文本框进行上传)</span>
                                    <input type="text" name="links_pic" id="picture" class="form-control" />
                                </div>
                                <input type="submit" class="btn btn-primary" value="提交" id="submit">
                                <input type="reset" class="btn btn-default" value="重置">
                              </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                      </div>
                    <!-- /.row (nested) -->
                  </div>
                <!-- /.panel-body -->
              </div>
            <!-- /.panel -->
          </div>
        <!-- /.col-lg-12 -->
      </div>
    <!-- /.row -->
@endsection
