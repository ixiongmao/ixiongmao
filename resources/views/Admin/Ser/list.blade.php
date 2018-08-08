@extends('Admin.common')

@section('AD2_title', '服务标准')

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
                                    <th>标题</th>
                                    <th>内容</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $v)
                                <tr>
                                    <td>{{ $v['id'] }}</td>
                                    <td>
                                      @if ($v['service_status'] == 0)
                                        <font color="red">隐藏</font>
                                      @else
                                        显示
                                      @endif</td>
                                    <td>{{ $v['service_title'] }}</td>
                                    <td><button type="button" class="btn btn-outline btn-default btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-ixiongmao-{{ $v['id'] }}">点击查看详细</button></td>
                                    <td><a href="/admin/ser/edit/{{ $v['id'] }}" class="btn btn-primary btn-sm">修改</a> |
                                        <a href="/admin/ser/del/{{ $v['id'] }}" class="btn btn-danger btn-sm" onclick="return confirm('你确定要删除吗？(不可恢复)')">删除</a></td>
                                </tr>
                                <style type="text/css">
                                  .ixongmao_content img{
                                    width: 100%;
                                  }
                                </style>
                                  <!-- 图片放大加载开始 -->
                                  <div class="modal fade bs-example-modal-lg-ixiongmao-{{ $v['id'] }}" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="myModalLabel">随意点击框外面其他处，即可关闭</h4>
                                        </div>
                                        <div class="ixongmao_content" style="margin:0px;padding:5px;">
                                          <p>{!! $v['service_content'] !!}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <!-- 图片放大加载结束 -->
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
