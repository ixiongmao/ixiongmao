@extends('Admin.common')

@section('AD2_title', '用户记录查看')

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
                    <form action="/admin/user/record" method="get">
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
                        @if (session('Error'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session('Error') }}
                        </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>用户登录记录</th>
                                    <th>用户消费记录</th>
                                    <th>用户收藏</th>
                                    <th>用户浏览记录</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $k => $v)
                                <tr>
                                    <td>{{ $v->u_name }}</td>
                                    <td><a href="/admin/user/record/list/{{ $v->id }}?Record=dlrecord" class="btn btn-outline btn-default btn-sm">查看用户登录记录</a></td>
                                    <td><a href="/admin/user/record/list/{{ $v->id }}?Record=balance" class="btn btn-outline btn-default btn-sm">查看用户消费记录</a></td>
                                    <td><a href="/admin/user/record/list/{{ $v->id }}?Record=collect" class="btn btn-outline btn-default btn-sm">查看用户收藏</a></td>
                                    <td><a href="/admin/user/record/list/{{ $v->id }}?Record=browse" class="btn btn-outline btn-default btn-sm">查看用户浏览记录</a></td>
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
