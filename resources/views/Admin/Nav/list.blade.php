@extends('Admin.common')

@section('AD2_title', '导航管理')

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
                                    <th>名称</th>
                                    <th>地址</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($Nav_data as $v)
                                <tr>
                                    <td>{{ $v['id'] }}</td>
                                    <td>
                                      @if ($v['nav_status'] == 0)
                                        <font color="red">隐藏</font>
                                      @else
                                        显示
                                      @endif</td>
                                    <td>{{ $v['nav_name'] }}</td>
                                    <td>{{ $v['nav_url'] }}</td>
                                    <td><a href="/admin/nav/edit/{{ $v['id'] }}" class="btn btn-primary btn-sm">修改</a> |
                                        <a href="/admin/nav/del/{{ $v['id'] }}" class="btn btn-danger btn-sm" onclick="return confirm('你确定要删除吗？(不可恢复)')">删除</a></td>
                                </tr>
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
