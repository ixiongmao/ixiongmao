@extends('Admin.common')

@section('AD2_title', '轮播图管理')

@section('Left_Nav')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">@yield('AD2_title')</div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        @if (session('Success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session('Success') }}
                        </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>状态</th>
                                    <th>幻灯片名</th>
                                    <th>幻灯片地址</th>
                                    <th>幻灯片图片</th>
                                    <th>操作</th></tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $k => $v)
                                <tr>
                                    <td>{{ $v['id'] }}</td>
                                    <td>
                                      @if ($v['banner_status'] == 0)
                                      <font color="red">隐藏</font>
                                      @else
                                      显示
                                      @endif
                                    </td>
                                    <td>{{ $v['banner_name'] }}</td>
                                    <td>{{ $v['banner_url'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline btn-default btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-{{ $v['id'] }}">点击查看图片</button>
                                    </td>
                                    <td>
                                        <a href="/admin/banner/edit/{{ $v['id'] }}" class="btn btn-primary btn-sm">修改</a> |
                                        <a href="/admin/banner/del/{{ $v['id'] }}" class="btn btn-danger btn-sm" onclick="return confirm('你确定要删除吗？(不可恢复)')">删除</a></td>
                                </tr>
                                <!-- 图片加载开始 -->
                                <div class="modal fade bs-example-modal-lg-{{ $v['id'] }}" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">随意点击框外面其他处，即可关闭</h4></div>
                                            <div class="modal-body" style="text-align: center;">
                                                <img src="{{ $v['banner_pic'] }}" alt="" width="100%"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 图片加载结束 -->
                                @endforeach
                              </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.panel-body -->
              </div>
            <!-- /.panel -->
          </div>
        <!-- /.col-lg-6 -->
      </div>
@endsection
