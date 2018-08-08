@extends('Admin.common')

@section('AD2_title', '员工管理')

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
                    <form action="/admin/admin/index" method="get">
                        <div class="col-sm-12" style="float:  right;">
                            <div class="form-group input-group">
                              <label>请输入关键字</label>
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
                                    <th>员工名</th>
                                    <th>员工权限</th>
                                    <th>登录信息</th>
                                    <th>添加时间</th>
                                    <th>操作</th></tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $k => $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>
                                      @if ($v->a_status == 0)
                                        <font color="red">冻结</font>
                                      @else
                                        正常
                                      @endif
                                    </td>
                                    <td>{{ $v->a_name }}</td>
                                    <td>{{ $v->a_permission }}</td>
                                    <td><a class="btn btn-outline btn-default btn-sm" href="/admin/admin/record/{{ $v->id }}" title"点击查看员工登录操作记录">点击查看员工登录记录</button>
                                    </td>
                                    <td>{{ date('Y-m-d H:i:s',$v->a_time) }}</td>
                                    <td><a href="/admin/admin/edit/{{ $v->id }}" class="btn btn-primary btn-sm">修改</a>
                                      <a href="/admin/admin/destroy/{{ $v->id }}" class="btn btn-danger btn-sm" onclick="return confirm('删除不可恢复，你确定要删除吗？(此操作不可逆)')">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                              {!! $data -> appends(['Search' =>$Search]) -> render() !!}
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
