@extends('Admin.common')

@section('AD2_title', '用户收货地址')

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
                    <form action="/admin/address/index" method="get">
                        <div class="col-sm-12" style="float:  right;">
                            <div class="form-group input-group">
                              <label>请输入关键字(收货人的名字)</label>
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
                        @elseif (session('Error'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session('Error') }}
                        </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户</th>
                                    <th>收货人</th>
                                    <th>收货人电话</th>
                                    <th>收货人地址</th>
                                    <th>操作</th></tr>
                            </thead>
                            <tbody>
                              @foreach ($Address_data as $v)
                                @foreach ($User_data as $vv)
                                  @if ($vv['id'] == $v['uid'])
                                <tr>
                                    <td>{{ $v['id'] }}</td>
                                    <td>{{ $vv['u_name'] }}</td>
                                    <td>{{ $v['address_name'] }}</td>
                                    <td>{{ $v['address_phone'] }}</td>
                                    <td>{{ $v['address_address'] }}</td>
                                    <td><a href="/admin/address/del/{{ $v['id'] }}" class="btn btn-danger btn-sm">删除</a></td>
                                </tr>
                                    @endif
                                  @endforeach
                                @endforeach
                              </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                              {!! $Address_data -> appends(['Search' =>$Search]) -> render() !!}
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
