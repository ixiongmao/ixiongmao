@extends('Admin.common')

@section('AD2_title', '用户管理')

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
                  <div class="row">
                    <form action="/admin/user/index" method="get">
                        <div class="col-sm-12" style="float:  right;">
                            <div class="form-group input-group">
                              <label>请选择关键字</label>
                                <input type="text" name="Search" class="form-control" style="border-radius: 5px 0px 0px 5px;">
                                <span class="input-group-btn">
                                  <button class="btn btn-default" type="submit" style="margin-top: 25px;"><i class="fa fa-search" title="点击搜索"></i></button></span>
                            </div>
                        </div>
                    </form>
                  </div>
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
                                    <th>邮箱状态</th>
                                    <th>用户名</th>
                                    <th>用户性别</th>
                                    <th>用户头像</th>
                                    <th>用户邮箱</th>
                                    <th>用户手机号</th>
                                    <th>用户余额</th>
                                    <th>注册时间</th>
                                    <th>操作</th></tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $k => $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>
                                      @if ($v->u_status == 0)
                                      <font color="red">冻结</font>
                                      @else
                                      正常
                                      @endif
                                    </td>
                                  <td>
                                      @if ($v->u_mail_status == 0)
                                      <font color="red">未验证</font>
                                      @else
                                      已验证
                                      @endif
                                    </td>
                                    <td>{{ $v->u_name }}</td>
                                    <td>
                                      @if ($v->u_sex == 1)
                                        女
                                      @elseif ($v->u_sex == 2)
                                        男
                                      @else
                                        保密
                                      @endif
                                    </td>
                                    <td><button type="button" class="btn btn-outline btn-default btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm-{{ $v->id }}">点击查看用户头像</button>
                                    </td>
                                    <td>{{ $v->u_email }}</td>
                                    <td>{{ $v->u_phone }}</td>
                                    <td>{{ $v->u_money }}</td>
                                    <td>{{ date('Y-m-d H:i:s',$v->u_time) }}</td>
                                    <td>
                                        <a href="/admin/user/edit/{{ $v->id }}" class="btn btn-primary btn-sm">修改</a> |
                                        <a href="/admin/user/destroy/{{ $v->id }}" class="btn btn-danger btn-sm" onclick="return confirm('删除后放入回收站，你确定要删除吗？(可在回收站恢复)')">删除</a></td>
                                </tr>
                                <!-- 反馈加载开始 -->
                                <div class="modal fade bs-example-modal-sm-{{ $v->id }}" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">随意点击框外面其他处，即可关闭</h4></div>
                                            <div class="modal-body" style="text-align: center;">
                                                <img src="{{ $v->u_photo }}" alt="" width="100%"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 反馈加载结束 -->
                                @endforeach
                              </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                              {!! $data -> appends(['search' =>$search]) -> render() !!}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
              </div>
            <!-- /.panel -->
          </div>
        <!-- /.col-lg-6 -->
      </div>
@endsection
