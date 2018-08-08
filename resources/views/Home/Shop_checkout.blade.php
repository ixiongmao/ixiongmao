@extends('Home.common')
@section('Home_title','购物车结算')
@section('content')
        <link rel="stylesheet" href="/Home/static/css/Car/flow.css">
        <link rel="stylesheet" href="/Home/static/css/Car/cart.css">
        @if ($Shop_Car_nums)
        <div class="page-main">
            <div class="container clearfix">
                <div class="checkout-box confirm-order-box">
                    <h2>确认订单信息</h2>
                    <div class="flowBox_in">
                        <form action="/flow/cars" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="totalpricenums" value="" id="TotalpriceNumInput">
                            <ul class="box-main clearfix">
                                <li class="section-options clearfix">
                                    <div class="layui-tab" lay-filter="test">
                                        <ul class="layui-tab-title">
                                            <li class="layui-this">收货人信息</li>
                                        </ul>
                                        <div class="layui-tab-content">
                                            <div class="layui-tab-item layui-show">
                                            @foreach ($U_address as $v)
                                              @if ($v['address_status'] == 1)
                                              <div style="margin-top: 10px;">
                                                <input type="radio" name="address_id" value="{{ $v['id'] }}" checked ><span id="span">名字：{{ $v['address_name']}} &nbsp;电话：{{ $v['address_phone']}} &nbsp; 地址：{{ $v['address_address']}} </span> &nbsp;<b style="font-size:15px;color:#000;">(默认地址)</b>
                                              </div>
                                              @elseif ($v['address_status'] == 0)
                                              <div style="margin-top: 10px;">
                                                <input type="radio" name="address_id" value="{{ $v['id'] }}">名字：{{ $v['address_name']}} &nbsp;电话：{{ $v['address_phone']}} &nbsp; 地址：{{ $v['address_address']}}
                                              </div>
                                              @endif
                                            @endforeach
                                            </div>
                                          </div>
                                          <script type="text/javascript">
                                          //  $('input[type=radio]')
                                          if ($('input[type=radio]:checked')) {
                                              $('#span').css('color','#c01734')
                                          }
                                          </script>
                                    </div>
                                </li>
                                <li class="section-options clearfix">
                                    <div class="layui-tab" lay-filter="test">
                                        <ul class="layui-tab-title">
                                            <li class="layui-this">在线支付</li>
                                        </ul>
                                        <div class="layui-tab-content">
                                            <div class="layui-tab-item layui-show">
                                              <div style="margin-top:  10px;">
                                                <input type="radio" name="orders_paymothed" value="0" checked> 余额支付
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </li>
                                <li class="section-options clearfix">
                                    <div class="layui-tab" lay-filter="test">
                                        <ul class="layui-tab-title">
                                            <li class="layui-this">配送方式</li>
                                        </ul>
                                        <div class="layui-tab-content">
                                            <div class="layui-tab-item layui-show">
                                              <div style="margin-top:  10px;">
                                              <label class="checkout-item checkout-item3">顺丰速运</label>
                                              <div style="margin-top:10px">注：新疆、青海、西藏不包邮，请联系客服确认快递信息，否则不予发货！</div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </li>
                                <li class="section-options clearfix section-goods">
                                    <div class="section-header clearfix">
                                        <h3 class="title">商品列表</h3>
                                        <a href="/shop_car/" class="modify">返回购物车
                                            <i class="iconfont"></i></a>
                                    </div>
                                    <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" class="goods-list-table">
                                        <tbody>
                                          @foreach ($U_Car as $v)
                                            @foreach ($U_CarGoods as $vv)
                                              @if ($v['gid'] == $vv['id'])
                                                @foreach ($U_Goods_details as $vvv)
                                                  @if ($vvv['gid'] == $vv['id'])
                                            <tr>
                                              <input type="hidden" name="goods_id[]" value="{{ $vv['id'] }}">
                                                <td bgcolor="#ffffff">
                                                    <img src="{{ $vv['goods_pic'] }}" title="{{ $vv['goods_name'] }}" width="30" height="30">
                                                    <a href="/item/{{ $vv['id'] }}" target="_blank" class="f6">
                                                      {{ $vv['goods_name'] }}
                                                      @if ($v['meal_detail'] != '')
                                                        &nbsp; |&nbsp;  套餐：{{ $v['meal_detail'] }}
                                                        <input type="hidden" name="o_meal_name" value="{{ $v['meal_detail'] }}">
                                                        <input type="hidden" name="o_meal_price" value="{{ $v['meal_price'] }}">
                                                      @endif
                                                    </a>
                                                </td>
                                                <td class="weiruan" bgcolor="#ffffff" align="right">送 <span name="integralNums">{{ $vvv['goods_score'] * $v['shop_num'] }}</span> 积分</td>
                                                <td class="weiruan" bgcolor="#ffffff" align="right">
                                                  @if((time() < $vv['goods_sales_end']) && (time() > $vv['goods_sales_start']))
                                                  <!-- 先判断是否搞促销 -->
                                                    @if (!empty($v['meal_detail']))
                                                    <input type="hidden" name="danjia[]" value="{{ $vv['goods_sales_price']+$v['meal_price'] }}">
                                                      {{ $vv['goods_sales_price']+$v['meal_price'] }}
                                                    @else
                                                      <input type="hidden" name="danjia[]" value="{{ $vv['goods_sales_price'] }}">
                                                      {{ $vv['goods_sales_price'] }}
                                                    @endif
                                                  @else
                                                    @if (!empty($v['meal_detail']))
                                                    <input type="hidden" name="danjia[]" value="{{ $vv['goods_price']+$v['meal_price'] }}">
                                                      {{ $vv['goods_price']+$v['meal_price'] }}
                                                    @else
                                                    <input type="hidden" name="danjia[]" value="{{ $vv['goods_price'] }}">
                                                      {{ $vv['goods_price'] }}
                                                    @endif
                                                  @endif
                                                </td>
                                                <input type="hidden" name="o_number[]" value="{{ $v['shop_num'] }}">
                                                <td class="weiruan" bgcolor="#ffffff" align="right">{{ $v['shop_num'] }}</td>
                                                <td class="weiruan" bgcolor="#ffffff" align="right" name="zongjia">
                                                  @if((time() < $vv['goods_sales_end']) && (time() > $vv['goods_sales_start']))
                                                  <!-- 先判断是否搞促销 -->
                                                    @if (empty($v['meal_detail']))
                                                    <input type="hidden" name="goods_price[]" value="{{ $vv['goods_sales_price']*$v['shop_num'] }}">
                                                      {{ $vv['goods_sales_price']*$v['shop_num'] }}
                                                    @else
                                                    <input type="hidden" name="goods_price[]" value="{{ $vv['goods_sales_price']*$v['shop_num']+$v['meal_price'] }}">
                                                      {{ $vv['goods_sales_price']*$v['shop_num']+$v['meal_price'] }}
                                                    @endif
                                                  @else
                                                    @if (empty($v['meal_detail']))
                                                    <input type="hidden" name="goods_price[]" value="{{ $vv['goods_price']*$v['shop_num'] }}">
                                                      {{ $vv['goods_price']*$v['shop_num'] }}
                                                    @else
                                                    <input type="hidden" name="goods_price[]" value="{{ $vv['goods_price']*$v['shop_num']+$v['meal_price'] }}">
                                                    {{ $vv['goods_price']*$v['shop_num']+$v['meal_price'] }}
                                                    @endif
                                                  @endif
                                                </td>
                                            </tr>
                                                    @endif
                                                  @endforeach
                                                @endif
                                              @endforeach
                                            @endforeach
                                            <tr>
                                                <td bgcolor="#ffffff" colspan="7">购物金额小计 <b id="TotalpriceNum"></b> <b style="color:  red;">(套餐不随购买商品数量的增加而改变)</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>

                                <li class="section-options clearfix section-count">
                                    <h3 class="section-header"><span>费用总计</span></h3>
                                    <div id="ECS_ORDERTOTAL" class="money-box">
                                        <ul>
                                            <input type="hidden" name="integral" value="" id="IntegralNumInput">
                                          <li class="clearfix">
                                              <label>购买即送：</label>
                                              <span class="val">
                                                  <font class="f4_b"><span id="IntegralNum"></span> </font>积分</span>
                                            </li>

                                            <li class="clearfix total-price">
                                                <label>应付款金额：</label>
                                                <span class="val">
                                                    <em id="TotalpriceNums"></em></span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="section-options clearfix" style="border-bottom:none;">
                                    <div style="margin:8px auto; text-align:right;">
                                       <input type="image" src="/Home/static/images/bnt_subOrder.gif" id="submit">
                                      </div>
                                    </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
          $(function() {
              $('#submit').click(function() {
                var ixiongmao_radio = $('input[type=radio]:checked').val();
                if (ixiongmao_radiov == undefined) {
                  layer.msg('请选择收货地址');
                  return false;
                }                
              });
          });
        var divs = document.getElementsByName('zongjia');
            var b = 0;
            for (var i = 0; i < divs.length; i++) {
                b += parseInt(divs[i].innerText);
            }
            $('#TotalpriceNum').html(b);
            $('#TotalpriceNums').html(b);
            $('#TotalpriceNumInput').val(b);

            var integralNums = document.getElementsByName('integralNums');
            var nums = 0;
            for (var i = 0; i < integralNums.length; i++) {
              nums += parseInt(integralNums[i].innerText);
            }
            $('#IntegralNum').html(nums);
            $('#IntegralNumInput').val(nums);
        </script>
        @else
        <div class="page-main" id="cart-box">
            <div class="container">
                <div class="cart-empty">
                    <h2>您的购物车还是空的!</h2>
                    <a href="/" class="btn btn-primary">马上去购物</a></div>
            </div>
        </div>

      @endif
@endsection
