@extends('Admin.common')

@section('AD2_title', '友情链接管理')

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
                                    <th>友情链接名</th>
                                    <th>友情链接地址</th>
                                    <th>友情链接图片</th>
                                    <th>操作</th></tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $k => $v)
                                <tr>
                                    <td>{{ $v['id'] }}</td>
                                    <td>{{ $v['links_name'] }}</td>
                                    <td>{{ $v['links_url'] }}</td>
                                    <td><button type="button" class="btn btn-outline btn-default btn-sm" data-toggle="modal" data-target=".detail-{{ $v['id'] }}">点击查看详细</button></td>
                                    <td>
                                        <a href="/admin/links/edit/{{ $v['id'] }}" class="btn btn-primary btn-sm">修改</a> |
                                        <a href="/admin/links/del/{{ $v['id'] }}" class="btn btn-danger btn-sm" onclick="return confirm('你确定要删除吗？(不可恢复)')">删除</a></td>
                                </tr>
                                <!-- 详细加载开始 -->
                                <div class="modal fade detail-{{ $v['id'] }}" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">随意点击框外面其他处，即可关闭</h4>
                                      </div>
                                      <p><img src="{{ $v['links_pic'] }}" alt="" width="100%" style="margin:0px;padding:5px;"></p>
                                    </div>
                                  </div>
                                </div>
                              <!-- 详细加载结束 -->
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
