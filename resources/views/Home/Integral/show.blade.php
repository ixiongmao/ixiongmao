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
                                        <a href="/user/Integral/list" class="modify">返回积分列表
                                            <i class="iconfont"></i></a>
                                    </div>
                                    <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" class="goods-list-table">
                                        <tbody>
                                            <tr>
                                                <td bgcolor="#ffffff">
                                                    <img src="{{ $scores_goods['goods_scores_pic'] }}" title="{{ $scores_goods['goods_scores_name'] }}" width="30" height="30">
                                                    <a href="/scoregoods/scoredeal/{{ $scores_goods['id'] }}" target="_blank" class="f6">{{ $scores_goods['goods_scores_name'] }}</a></td>
                                                <td bgcolor="#ffffff">1个</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </li>

                          </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
