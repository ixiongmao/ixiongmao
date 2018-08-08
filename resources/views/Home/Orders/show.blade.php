@extends('Home.common')
@section('Home_title','订单信息查看-'.$Order_id)
@section('content')
        <link rel="stylesheet" href="/Home/static/css/Car/flow.css">
        <link rel="stylesheet" href="/Home/static/css/Car/cart.css">
        <div class="page-main">
            <div class="container clearfix">
                <div class="checkout-box confirm-order-box">
                    <h2>查看订单信息-{{ $Order_id }}</h2>
                    <div class="flowBox_in">
                            <ul class="box-main clearfix">
                                <li class="section-options clearfix">
                                    <div class="layui-tab" lay-filter="test">
                                        <ul class="layui-tab-title">
                                            <li class="layui-this">收货人信息</li>
                                        </ul>
                                        <div class="layui-tab-content">
                                            <div class="layui-tab-item layui-show">
                                              <div style="margin-top: 10px;">名字： {{ $U_address['address_name'] }}&nbsp;电话： {{ $U_address['address_phone'] }}&nbsp; 地址： {{ $U_address['address_address'] }}
                                              </div>
                                            </div>
                                          </div>

                                    </div>
                                </li>
                                <li class="section-options clearfix section-goods">
                                    <div class="section-header clearfix">
                                        <h3 class="title">订单详细商品列表</h3>
                                        <a href="/user/my_orders/" class="modify">返回我的订单
                                            <i class="iconfont"></i></a>
                                    </div>
                                    <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" class="goods-list-table">
                                        <tbody>

                                          @foreach ($U_goods as $k=>$v)
                                            @if (in_array($v['id'],explode(',',$U_orders['goods_id'])))
                                            <tr>
                                                <td bgcolor="#ffffff">
                                                    <img src="{{ $v['goods_pic'] }}" title="{{ $v['goods_name'] }}" width="30" height="30">
                                                    <a href="/item/{{ $v['id'] }}" target="_blank" class="f6">{{ $v['goods_name'] }} &nbsp;
                                                      @if (!empty($U_orders['orders_meal_name']) && !empty($U_orders['orders_meal_price']))
                                                        |&nbsp; 套餐：{{ $U_orders['orders_meal_name'] }}
                                                      @endif
                                                      </a></td>
                                            </tr>

                                            @endif
                                            @endforeach

                                            <tr>
                                                <td bgcolor="#ffffff" colspan="7">购物金额小计 {{ $U_orders['orders_total_prices'] }}<b style="color:  red;">(套餐不随购买商品数量的增加而改变)</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>

                                <li class="section-options clearfix section-count">
                                    <h3 class="section-header"><span>费用总计</span></h3>
                                    <div id="ECS_ORDERTOTAL" class="money-box">
                                        <ul>
                                          <li class="clearfix">
                                              <label>购买即送：</label>
                                              <span class="val">
                                                  <font class="f4_b">{{ $U_orders['orders_score'] }}</font>积分</span>
                                            </li>
                                            <li class="clearfix total-price" style="margin-bottom: 40px;">
                                                <label>应付款金额：</label><em>{{ $U_orders['orders_total_prices'] }}</em>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
