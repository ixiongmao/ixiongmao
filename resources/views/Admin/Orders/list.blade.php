@extends('Admin.common')

@section('AD2_title', '订单管理')

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
                    <form action="/admin/orders/index" method="get">
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
                                    <th>用户</th>
                                    <th>购买的商品</th>
                                    <th>订单总金额</th>
                                    <th>支付方式</th>
                                    <th>订单号</th>
                                    <th>积分</th>
                                    <th>下单时间</th>
                                    <th>收货人</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($Orders_data as $v)
                                @foreach ($User_data as $vv)
                                  @if ($v['user_id'] == $vv['id'])
                                   @foreach ($Goods_data as $vvv)
                                      @if ($vvv['id'] == $v['goods_id'])
                                        @foreach ($Address_data as $vvvv)
                                          @if ($vvvv['id'] == $v['address_id'])
                                <tr>
                                    <td>{{ $v['id'] }}</td>
                                    <td>
                                    @if ($v['orders_status'] == 0)
                                      <font color="red"><strong>已支付</strong></font>
                                    @elseif ($v['orders_status'] == 1)
                                      <font color="#eea236"><strong>已发货</strong></font>
                                    @elseif ($v['orders_status'] == 2)
                                      <font color="#31b0d5"><strong>已签收</strong></font>
                                    @elseif ($v['orders_status'] == 3)
                                      <font color="#06c1ae"><strong>已完成</strong></font>
                                    @endif
                                    </td>
                                    <td>{{ $vv['u_name'] }}</td>
                                    <td><a href="/admin/orders/index/{{ $v['orders_orderid'] }}" class="btn btn-outline btn-default btn-sm">查看商品</a></td>
                                    <td>{{ $v['orders_total_prices'] }}</td>
                                    <td>
                                      @if ($v['orders_paymethod'] == 0)
                                        余额支付
                                      @endif
                                    </td>
                                    <td>{{ $v['orders_orderid'] }}</td>
                                    <td>{{ $v['orders_score'] }}</td>
                                    <td>{{ date('Y-m-d H:i:s',$v['orders_time']) }}</td>
                                    <td><button type="button" class="btn btn-outline btn-default btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm-consignee-{{ $v['id'] }}">点击查看收货人</button></td>
                                    <td><a href="https://m.kuaidi100.com/result.jsp?nu={{ $v['orders_odd'] }}" target="_blank">查看快递信息</a>
                                      @if ($v['orders_status'] == 0) | <button type="button" class="btn btn-outline btn-default btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm-{{ $v['id'] }}">点击填写单号</button>
                                      @endif
                                    </td>
                                </tr>
                                <!-- 开始 -->
                                <div class="modal fade bs-example-modal-sm-consignee-{{ $v['id'] }}" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">随意点击框外面其他处，即可关闭</h4></div>
                                            <div class="modal-body">
                                              姓名：{{ $vvvv['address_name'] }} </br>
                                              电话：{{ $vvvv['address_phone'] }} </br>
                                              地址：{{ $vvvv['address_address'] }} </br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 结束 -->

                                <!-- 开始 -->
                                <div class="modal fade bs-example-modal-sm-{{ $v['id'] }}" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">随意点击框外面其他处，即可关闭</h4></div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="recipient-name" class="control-label">单号:</label>
                                                  <input type="text" class="form-control" name="signfor_odd-{{ $v['id'] }}" value="{{ $v['orders_odd'] }}">
                                                </div>
                                                <input type="button" class="btn btn-primary" value="保存" style="margin-left:25%" id="submit-{{ $v['id'] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 结束 -->
                                <script type="text/javascript">
                                  $(function() {
                                    $('#submit-{{ $v['id'] }}').click(function() {
                                        var signfor_odd = $('input[name=signfor_odd-{{ $v['id'] }}]').val();
                                        if (signfor_odd == '') {
                                          layer.msg('单号不能为空');
                                          return false;
                                        }
                                      $.ajax({
                                        url:'/admin/orders/update/signfor/{{ $v['id'] }}',
                                        type:'POST',
                                        data:{'signfor_odd':signfor_odd},
                                        success:function(msg){
                                            layer.msg(msg);
                                        },
                                        dataType:'HTML',
                                        async:true
                                      });
									location.reload(true);
                                    });
                                  });
                                </script>
                                            @endif
                                          @endforeach
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                @endforeach
                              </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                              {!! $Orders_data->appends(['Sesrch'=>$Search])->render() !!}
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
