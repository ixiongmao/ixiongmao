@extends('Admin.common')

@section('AD2_title', '用户消费记录查看')

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
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>状态</th>
                                  <th>金额</th>
                                  <th>订单号</th>
                                  <th>备注</th>
                                  <th>消费时间</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $k => $v)
                                  <tr>
                                      <td>{{ $v['id'] }}</td>
                                      <td>@if ($v['ex_status'] == 0)
                                        <font color="red"><strong>支出</strong></font>
                                      @else
                                        <font color="#06c1ae"><strong>转入</strong></font>
                                      @endif
                                      </td>
                                      <td>{{ $v['ex_money']}}</td>
                                      @if ($v['ex_orders_id'] == NULL)
                                        <td>{{ $v['ex_orderid'] }}</td>
                                      @else
                                        @foreach ($U_orders as $vv)
                                          @if ($vv['id'] == $v['ex_orders_id'])
                                          <td><a href="/user/my_orders/{{ $vv['orders_orderid'] }}">{{ $v['ex_orderid'] }}</a></td>
                                        @endif
                                       @endforeach
                                      @endif
                                      <td>{{ $v['ex_remark'] }}</td>
                                      <td>{{ date('Y-m-d H:i:s',$v['ex_time']) }}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                              {!! $data->appends(['Record'=>'balance'])->render() !!}
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
