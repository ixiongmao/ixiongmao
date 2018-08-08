@extends('Home.common')

@section('Home_title','购物车')

@section('content')

<link rel="stylesheet" href="/Home/static/css/Car/flow.css">
<link rel="stylesheet" href="/Home/static/css/Car/cart.css">
@if($Shop_Car_nums)
      <div class="page-main" id="cart-box">
          <div class="container">
              <div class="cart-goods-list">
                  <div class="list-head clearfix">
                      <div class="col col-img" id="itemsnum-top">图片</div>
                      <div class="col col-name">商品名称</div>
                      <div class="col col-price">单价</div>
                      <div class="col col-num">数量</div>
                      <div class="col col-total">小计</div>
                      <div class="col col-action">操作</div></div>
                  <div class="list-body">
                      <input type="hidden" name="is_presale" value="">
                      <input type="hidden" name="goods_id" value="613">
                      <!-- 单个商品购物车start -->
                      @foreach($shop as $k=>$v)
                        @foreach($goods as $ka=>$va)
                          @if($v['gid']==$va['id'])
                      <div class="item-box">
                          <div class="item-table">
                              <div class="item-row clearfix">
                                  <div class="col col-img">
                                      <a href="/item/{{ $va['id'] }} " target="_blank">
                                          <img alt="商品图片" src="{{ $va['goods_pic'] }}"></a></div>
                                  <div class="col col-name">
                                      <h3 class="name">
                                          <a href="/item/{{ $va['id'] }} " target="_blank">{{ $va['goods_name'] }}</a></h3>
                                      <!-- <p style="position:absolute; top:65px; left:100px;">111</p> -->
                                      @if($v['meal_detail'])
                                      <input type="hidden" id="taocan" name="meal_price" value="{{ $v['meal_price'] }}">
                                      <p class="desc">套餐:
                                          <span>{{ $v['meal_detail'] }}</span></p>
                                        @endif</div>
                                  <input type="hidden" id="taocanwu" name="meal_price_wu" value="5">@if($v['meal_detail'])
                                  <input type="hidden" id="taocan" name="meal_price" value="{{ $v['meal_price'] }}">@endif @if(time()>$va['goods_sales_start'] && time() < $va[ 'goods_sales_end']) <div class="col col-price">{{ $va['goods_sales_price'] }}</div>
                                  @else
                              <div class="col col-price">{{ $va['goods_price'] }}</div>
                              @endif
                              <div class="col col-num">
                                  <div class="change-goods-num clearfix">
                                    @foreach($goods_detail as $keys=>$value)
                                      @if($value['gid']==$va['id'])
                                      <input type="hidden" id="ku" name="nums" value="{{ $value['goods_nums'] }}">
                                      @endif
                                      @endforeach
                                      <input type="hidden" name="id" value="{{ $v['id'] }}">
                                      <a href="javascript:void(0)" class="minus" title="减少1个数量" onclick="countCut(this)">
                                          <i class="iconfont"></i></a>
                                      <input type="text" id="" name="order_num" value="{{ $v['shop_num'] }}" onchange="changeNum(this)">
                                      <a href="javascript:void(0)" class="add" title="增加1个数量" onclick="countAdd(this)">
                                          <i class="iconfont"></i></a>
                                  </div>
                              </div>
                              @if(time()>$va['goods_sales_start'] && time() < $va[ 'goods_sales_end'])
                                @if($v[ 'meal_detail'])
                                  <div class="col col-total" name="tal">{{ ($v['shop_num'])*($va['goods_sales_price'])+$v['meal_price'] }}</div>
                                @else
                          <div class="col col-total" name="tal">{{ ($v['shop_num'])*($va['goods_sales_price']) }}</div>
                            @endif
                          @else
                        @if($v['meal_detail'])
                          <div class="col col-total" name="tal">{{ ($v['shop_num'])*($va['goods_price'])+$v['meal_price'] }}</div>
                        @else
                          <div class="col col-total" name="tal">{{ ($v['shop_num'])*($va['goods_price']) }}</div>
                          @endif
                        @endif
                          <!-- 计算数量 -->
                          <script>$.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                  }
                              });

                              /**/
                              function countCut(obj) {
                                  var num = parseInt($(obj).next().val());
                                  var nums = num -= 1;
                                  if (nums <= 0) {
                                      alert("请输入合法数字！");
                                      $(obj).next().val(1);
                                      return;
                                  }

                                  $(obj).next().val(nums);

                                  var id = parseInt($(obj).prev().val());
                                  var price = parseInt($(obj).parent().parent().prev().html());
                                  var wu = parseInt($(obj).parent().parent().prev().prev().val());
                                  var prices = parseInt($(obj).parent().parent().prev().prev().val());

                                  if (wu == 5) {
                                      var t = price * nums;
                                  } else {
                                      var t = price * nums + prices;
                                  }

                                  $(obj).parent().parent().next().html(t);
                                  $.post('/score/update', {
                                      'id': id,
                                      'shop_num': nums,
                                      't': t
                                  },
                                  function(msg) {});
                                  total();

                              }

                              function countAdd(obj) {
                                  var num = parseInt($(obj).prev().val());
                                	
                             	   ku = $(obj).prev().prev().prev().prev().val();
                                   stock = parseInt(ku);
                                  
                                    if (num == stock) {
                                     alert("库存不足！"); 
                                     $(obj).prev().val(stock);
                                     return;
                                    }
                                  
                                	
                                
                                  var nums = num += 1;

                                  $(obj).prev().val(nums);
                                  var id = $(obj).prev().prev().prev().val();

                                  var price = $(obj).parent().parent().prev().html();
                                  var wu = parseInt($(obj).parent().parent().prev().prev().val());
                                  var prices = parseInt($(obj).parent().parent().prev().prev().val());

                                  if (wu == 5) {
                                      var t = price * nums;
                                  } else {
                                      var t = price * nums + prices;
                                  }

                                  $(obj).parent().parent().next().html(t);
                                  $.post('/score/update', {
                                      'id': id,
                                      'shop_num': nums,
                                      't': t
                                  },
                                  function(msg) {});
                                  total();
                              }

                              function changeNum(obj) {
                                  var num = parseInt($(obj).val());

                                  var id = $(obj).prev().prev().val();
                                  var price = $(obj).parent().parent().prev().html();
                                  var wu = parseInt($(obj).parent().parent().prev().prev().val());
                                  var prices = parseInt($(obj).parent().parent().prev().prev().val());
								  var stock = parseInt($(obj).prev().prev().prev().val());
                                  if (num > stock) {
                                   alert("库存不足！");
                                   $(obj).val(stock);
                                   return;
                                  }
                                  if (num > 0) {
                                      if (wu == 5) {
                                          var t = price * num;
                                      } else {
                                          var t = price * num + prices;
                                      }
                                      $(obj).parent().parent().next().html(t);
                                      $.post('/score/update', {
                                          'id': id,
                                          'shop_num': num,
                                          't': t
                                      },
                                      function(msg) {});
                                      total();
                                  } else {
                                      alert("请输入合法数字！");
                                      $(obj).val(1);
                                      changeNum(obj);
                                      return;
                                  }
                              }</script>
                          <script type="text/javascript">
                          function total() {
                                  var divs = document.getElementsByName('tal');
                                  var b = 0;
                                  for (var i = 0; i < divs.length; i++) {
                                      b += parseInt(divs[i].innerText);
                                  }
                                  $('#totalSkuPrice').html(b);
                              }
                            </script>
                          <div class="col col-action">
                              <a class="del" href="javascript:if (confirm('您确实要把该商品移出购物车吗？')) location.href='/shop_car/clear/{{ $v['id'] }}';">
                                  <i class="iconfont"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
              @endif
            @endforeach
          @endforeach
              <!-- 单个商品购物车end --></div>
          <p class="clear-cart">
              <a id="del-all" href="/shop_car/clearall/{{ $get_session['id'] }}">清空购物车</a></p>
          <div class="cart-bar clearfix">
              <div class="section-left">
                  <a class="back-shopping btn btn-gray" href="/">继续购物</a></div>
              <span class="total-price">
                  <span class="total-num"></span>&nbsp;&nbsp;&nbsp;合计：
                  <b id="totalSkuPrice">{{$total_price}}</b></span>
              <a href="/shop_car/checkout" class="btn btn-pay btn-primary">去结算</a></div>
      </div>
      </div>
      </div>
      <!-- 检测价格变化 -->
      <script type="text/javascript">
      var dsq = setInterval(function() {
              total();
              clearInterval(dsq);
          },
          1000);
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
