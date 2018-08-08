@extends('Admin.common')

@section('AD2_title', '余额充值卡密管理')

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
                        @if (session('Error'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session('Error') }}
                        </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>卡密状态</th>
                                    <th>使用用户</th>
                                    <th>卡号</th>
                                    <th>卡密</th>
                                    <th>卡密面值</th>
                                    <th>使用时间</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                  </tr>
                            </thead>
                            <tbody>
                              @foreach ($Data_balance_kami as $v)
                                <tr>
                                    <td>{{ $v['id'] }}</td>
                                    <td>
                                      @if ($v['kami_status'] == 0)
                                        <font color="red">未使用</font>
                                      @else
                                        <font color="#06c1ae">已使用</font>
                                      @endif
                                    </td>
                                    <td>
                                      @if ($v['uid'] == NULL)
                                        无
                                      @else
                                      @foreach ($Data_user as $vv)
                                        @if ($vv['id'] == $v['uid'])
                                          {{ $vv['u_name'] }}
                                        @endif
                                      @endforeach
                                      @endif
                                    </td>
                                    <td>{{ $v['kami_name'] }}</td>
                                    <td>{{ $v['kami_password'] }}</td>
                                    <td>{{ $v['kami_denomination'] }}</td>
                                    <td>@if ($v['kami_modify_time'] == NULL)
                                        无
                                      @else
 										{{ date('Y-m-d H:i:s',$v['kami_modify_time']) }}
                                      @endif
                                     </td>
                                    <td>{{ date('Y-m-d H:i:s',$v['kami_time']) }}</td>
                                    <td><a href="/admin/kami/del/{{ $v['id'] }}" class="btn btn-danger btn-sm" onclick="return confirm('删除不可恢复，你确定要删除吗？(此操作不可逆)')">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                              {!! $Data_balance_kami -> render() !!}
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
