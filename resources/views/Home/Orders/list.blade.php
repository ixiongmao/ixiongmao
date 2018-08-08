@extends('Home.User.Ucommon')
@section('Home_title','我的订单')
@section('User_content')
                    <div class="my_nala_centre ilizi_centre">
                        <div class="ilizi cle">
                            <div class="box">
                                <div class="box_1">
                                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                                        <h1>我的订单</h1>
                                        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                            <tbody>
                                                <tr align="center">
                                                    <td bgcolor="#ffffff">状态</td>
                                                    <td bgcolor="#ffffff">订单总金额</td>
                                                    <td bgcolor="#ffffff">支付方式</td>
                                                    <td bgcolor="#ffffff">订单号</td>
                                                    <td bgcolor="#ffffff">积分</td>
                                                    <td bgcolor="#ffffff">下单时间</td>
                                                    <td bgcolor="#ffffff">操作</td>
                                                </tr>
                                                @foreach ($U_orders as $v)
                                                <tr align="center">
                                                    <td bgcolor="#ffffff">
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
                                                    <td bgcolor="#ffffff">{{ $v['orders_total_prices'] }}</td>
                                                    <td bgcolor="#ffffff">
                                                      @if ($v['orders_paymethod'] == 0)
                                                        余额支付
                                                      @endif
                                                    </td>
                                                    <td bgcolor="#ffffff">{{ $v['orders_orderid'] }}</td>
                                                    <td bgcolor="#ffffff">{{ $v['orders_score'] }}</td>
                                                    <td bgcolor="#ffffff">{{ date('Y-m-d H:i:s',$v['orders_time']) }}</td>
                                                    <td bgcolor="#ffffff">
                                                      @if ($v['orders_status'] == 1)
                                                      <a href="https://m.kuaidi100.com/result.jsp?nu={{ $v['orders_odd'] }}" target="_blank">查看快递信息</a> |
                                                        @if ($v['orders_status'] != 2)
                                                          <a onclick="return confirm('您确定签收了吗？(如未签收，出现问题概不负责)')" href="/user/my_orders/signfor/{{ $v['id'] }}">点击签收</a> |
                                                        @endif
                                                      @endif
                                                      <a href="/user/my_orders/{{ $v['orders_orderid'] }}" target="_blank">查看此订单详细信息</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-sm-6" style="margin-top: -30px;">
                                            <div class="dataTables_paginate paging_simple_numbers">
                                                <ul class="pagination">
                                                   {!! $U_orders->render() !!}
                                                </ul>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
