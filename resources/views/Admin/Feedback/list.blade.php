@extends('Admin.common')

@section('AD2_title', '反馈管理')

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
                    <form action="/admin/feedback/index" method="get">
                        <div class="col-sm-12" style="float:  right;">
                            <div class="form-group input-group">
                              <label>请选择相关类型的关键字</label>
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
                                    <th>反馈用户</th>
                                    <th>反馈的标题</th>
                                    <th>反馈用户的邮箱</th>
                                    <th>反馈的信息</th>
                                    <th>反馈的时间</th>
                                    <th>操作</th></tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $v)
                                @foreach ($User_data as $vv)
                                  @if ($vv['id'] == $v['uid'])
                                <tr>
                                    <td>{{ $v['id'] }}</td>
                                    <td>{{ $vv['u_name'] }}</td>
                                    <td>{{ $v['feedbacks_name'] }}</td>
                                    <td>{{ $v['feedbacks_email'] }}</td>
                                    <td><button type="button" class="btn btn-outline btn-default btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-{{ $v['id'] }}">点击查看反馈的信息</button></td>
                                    <td>{{ date('Y-m-d H:i:s',$v['feedbacks_time']) }}</td>
                                    <td><a href="/admin/feedback/del/{{ $v['id'] }}" class="btn btn-danger btn-sm">删除</a></td>
                                </tr>
                                <!-- 反馈加载开始 -->
                                <div class="modal fade bs-example-modal-lg-{{ $v['id'] }}" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">随意点击框外面其他处，即可关闭</h4></div>
                                            <div class="modal-body">
                                              <div class="ixongmao_content">
                                                <p style="margin:0px;padding:5px;">{!! $v['feedbacks_content'] !!}</p>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 反馈加载结束 -->
                                    @endif
                                  @endforeach
                                @endforeach
                              </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                              {!! $data->appends(['Search'=>$Search])->render() !!}
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
