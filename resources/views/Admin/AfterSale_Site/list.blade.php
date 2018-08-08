@extends('Admin.common')

@section('AD2_title', '售后网点管理')

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
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              {{ session('Success') }}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>售后网点地址</th>
                      <th>联系电话</th>
                      <th>售后范围</th>
                      <th>操作</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $k => $v)
                  <tr>
                      <td>{{ $v['id'] }}</td>
                      <td>{{ $v['aftersale_site'] }}</td>
                      <td>{{ $v['aftersale_phone'] }}</td>
                      <td>{{ $v['aftersale_scope'] }}</td>
                      <td><a href="/admin/aftersale_site/edit/{{ $v['id'] }}" class="btn btn-primary btn-sm">修改</a> | <a href="/admin/aftersale_site/del/{{ $v['id'] }}" class="btn btn-danger btn-sm">删除</a></td>
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
