@extends('Home.User.Ucommon')

@section('Home_title','积分订单查看')

@section('User_content')
                    <div class="my_nala_centre ilizi_centre">
                        <div class="ilizi cle">
                            <div class="box">
                                <div class="box_1">
                                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                                        <h1>@yield('Home_title')</h1>
                                        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                            <tbody>
                                                <tr align="center">
                                                    <td bgcolor="#ffffff">状态</td>
                                                    <td bgcolor="#ffffff">订单号</td>
                                                    <td bgcolor="#ffffff">下单时间</td>
                                                    <td bgcolor="#ffffff">操作</td>
                                                </tr>
                                                @foreach ($goods_scores_orders as $v)
                                                <tr align="center">
                                                    <td bgcolor="#ffffff">
                                                    @if ($v['order_status'] == 0)
                                                      <font color="red"><strong>已下单</strong></font>
                                                    @elseif ($v['order_status'] == 1)
                                                      <font color="#eea236"><strong>已发货</strong></font>
                                                    @elseif ($v['order_status'] == 2)
                                                      <font color="#31b0d5"><strong>已完成</strong></font>
                                                    @endif
                                                    </td>
                                                    <td bgcolor="#ffffff">{{ $v['order_sn'] }}</td>
                                                    <td bgcolor="#ffffff">{{ date('Y-m-d H:i:s',$v['order_time']) }}</td>
                                                    <td bgcolor="#ffffff">
                                                      <a href="/user/Integral/list/{{ $v['order_sn'] }}" target="_blank">查看此订单详细信息</a> 
                                                      @if($v['order_status'] == 1)
                                                      | <a href="/user/Integral/sure/{{ $v['order_sn'] }}">点击签收</a>
                                                      @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-sm-6" style="margin-top: -30px;">
                                            <div class="dataTables_paginate paging_simple_numbers">
                                                <ul class="pagination">
                                                   {!! $goods_scores_orders->render() !!}
                                                </ul>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
