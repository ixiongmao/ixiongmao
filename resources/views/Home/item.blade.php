@extends('Home.common')

@section('Home_title', $goods->goods_name)

@section('Left_Nav')
    @parent
@endsection

@section('content')
<link href="/Home/static/css/goods.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function() {
       $(".quest").mouseover(function() {
           $(this).find(".tan").css('display', 'block');
       });
       $(".quest").mouseout(function() {
           $(this).find(".tan").css('display', 'none');
       });
   });
 </script>
<script type="text/javascript">
$(document).ready(function() {
       $(".reward").mouseover(function() {
           $(this).find(".ky").css('display', 'block');
       });
       $(".reward").mouseout(function() {
           $(this).find(".ky").css('display', 'none');
       });
   });
 </script>
<script type="text/javascript">
$(document).ready(function() {
       $(".ck").mouseover(function() {
           $(this).find(".tan1").css('display', 'block');
       });
       $(".ck").mouseout(function() {
           $(this).find(".tan1").css('display', 'none');
       });
   });
 </script>
<script type="text/javascript">
$(document).ready(function() {
       var $tab_li = $('.tab ul li');
       $tab_li.click(function() {
           $(this).addClass('active').siblings().removeClass('active');
           var index = $tab_li.index(this);
           $('div.tab_box > div').eq(index).show().siblings().hide();
       });
   });
 </script>
<script type="text/javascript">
function $id(element) {
       return document.getElementById(element);
   }
   //切屏--是按钮，_v是内容平台，_h是内容库
   function reg(str) {
       var bt = $id(str + "_b").getElementsByTagName("h2");
       for (var i = 0; i < bt.length; i++) {
           bt[i].subj = str;
           bt[i].pai = i;
           bt[i].style.cursor = "pointer";
           bt[i].onclick = function() {
               $id(this.subj + "_v").innerHTML = $id(this.subj + "_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
               for (var j = 0; j < $id(this.subj + "_b").getElementsByTagName("h2").length; j++) {
                   var _bt = $id(this.subj + "_b").getElementsByTagName("h2")[j];
                   var ison = j == this.pai;
                   _bt.className = (ison ? "": "h2bg");
               }
           }
       }
       $id(str + "_h").className = "none";
       $id(str + "_v").innerHTML = $id(str + "_h").getElementsByTagName("blockquote")[0].innerHTML;
   }
 </script>
<script type="text/javascript" src="/Home/static/js/magiczoomplus.js"></script>
<script type="text/javascript" src="/Home/static/js/easydialog.min.js"></script>
<script type="text/javascript" src="/Home/static/js/xiaomi_goods.js"></script>
<div class="breadcrumbs">
   <div class="container">
       <a href="../">首页</a>
       <code>&gt;</code>
       <a href="/list/{{ $firstid }}">{{ $first }}</a>
       <code>&gt;</code>
       <a href="/list/{{ $secondid }}">{{ $second }}</a>
       <code>&gt;</code>
       <a href="/list/{{ $goods->goods_cates }}">{{ $three }}</a>
       <code>&gt;</code>{{ $goods->goods_name }}
       </div></div>
<div class="goods-detail">
   <div class="goods-detail-info  clearfix J_goodsDetail">
       <div class="container">
           <div class="row">
               <div class="span13  J_mi_goodsPic_block goods-detail-left-info">
                   <div class="goods-pic-box" id="detail_img">
                       <div class="goods-big-pic">
                           <a href="{{ $goods['goods_pic'] }}" class="MagicZoomPlus" id="Zoomer" rel="hint-text: ; selectors-effect: false; selectors-class: current; zoom-distance: 60;zoom-width: 400; zoom-height: 400;">
                               <img alt="{{ $goods->goods_name }}" src="{{ $goods->goods_pic }}"></a>
                       </div>
                       <div class="goods-small-pic" id="item-thumbs">
                           <a class="prev" href="javascript:void(0);"></a>
                           <a class="next" href="javascript:void(0);"></a>
                           <div class="bd">
                               <ul class="cle">
                                   <!-- 左侧缩略图start -->
                                   @foreach(explode('|',$details['goods_pics']) as $key=>$val)
                                   <li class="current">
                                       <a href="{{ $val }}" rel="zoom-id: Zoomer" rev="{{ $val }}">
                                           <img alt="{{ $goods['goods_name'] }}" src="{{ $val }}"></a></li>
                                    @endforeach
                                   <!-- 左侧缩略图start -->
                                 </ul>
                              </div>
                       </div>
                   </div>
               </div>
               <div class="span7 goods-info-rightbox">
                   <form action="/shop_car/store" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
                     {{ csrf_field() }}
                       <div class="goods-info-box" id="item-info">
                           <dl class="loaded">
                               <dt class="goods-info-head">
                                   <dl>
                                       <dt class="goods-name">{{ $goods->goods_name }}</dt>
                                       <dd class="goods-phone-type">
                                           <p>{{ $goods->goods_discript }}</p>
                                       </dd>
                                       @if($goods->goods_sales_status && time()<$goods->goods_sales_end && time()>$goods->goods_sales_start)
                                           <div id="dis1">
                                               <del>官方价格：
                                                   <em class="cancel">{{ $goods->goods_price }}</em>
                                                   <input type="hidden" name="id" value="{{ $goods->id }}">
                                                </del>
                                               <dd class="goods-info-head-price clearfix">
                                                   <span class="icon_promo">限时秒杀</span>￥
                                                   <span class="unit">
                                                       <strong id="ss" class="nala_price red">{{ $goods->goods_sales_price }}</strong></span>
                                                   <input type="hidden" id="h1" name="h1" value="{{ $goods->goods_sales_price }}">
                                                   <input type="hidden" id="" name="st1" value="{{ $goods->goods_sales_start }}">
                                                   <input type="hidden" id="he" name="he" value="{{ $goods->goods_sales_end }}">
                                                   <i class="iconfont" style="margin-left: 1px">☀</i>
                                                   <span id="time_tip">剩余时间：</span>
                                                   <span class="colockbox" id="colockbox1"></span>
                                               </dd>
                                           </div>
                                           @else
                                           <div id="dis2">
                                               <dd class="goods-info-head-price clearfix">
                                                   <span class="icon_promo">官方价格</span>￥
                                                   <span class="unit">
                                                       <strong id="ss" class="nala_price red">{{ $goods->goods_price }}</strong></span>
                                                     <input type="hidden" name="id" value="{{ $goods->id }}">
                                                   <input type="hidden" id="h1" name="h1" value="{{ $goods['goods_price'] }}">
                                                 </dd>
                                           </div>
                                           @endif
                                           <dd style="position: relative">
                                               <ul>
                                                   <br/>
                                                   <div class="buy-mob-centent2" style="left: -20px;display: inline-block;">
                                                       <div class="link-buy-mob" style="display: inline-block;color:#005AA0;">去手机购买&nbsp;&nbsp;
                                                           <span class="icon-mob"></span></div>
                                                       <i class="iconfont"></i>
                                                       <div class="to-mob-img">
                                                           <img src="https://api.lwl12.com/img/qrcode/get?ct={{ $url }}&w=200&h=200" width="100%">
                                                     
                                                     </div>
                                                   </div>
                                                   <li>
                                                       <span class="lbl">商品库存：</span>
                                                       <em id="ku">{{ $details['goods_nums'] }}</em></li>
                                                   <li>
                                                       <span>此商品赠送：可获
                                                           <em class="red">{{ $details['goods_score'] }}</em>积分</span></li>
                                                   <li style="color:#666;"></li>
                                               </ul>
                                           </dd>
                                           <dd class="goods-info-choose">
                                             @if((explode(',',$details['goods_set_meals'])[0])=='0' && (explode(',',$details['goods_set_meals'])[1])=='0')
                                             
                                             @else
                                               <div id="choose" class="spec_list_box">
                                                   <ul>
                                                       <li>
                                                           <div class="dt">搭配套餐：</div>
                                                           <div class="dd">
                                                               <div class="check_main_1 fl">
                                                                 @foreach(explode(',',$details['goods_set_meals']) as $k=>$v)
                                                                  @foreach($meals as $va)
                                                                    @if($va['id'] == $v)
                                                                   <div class="check_item">
                                                                       <label for="spec_value_24790">
                                                                           <input type="checkbox" name="che[]" value="{{ $va['id'] }}" onclick="changePrice()" />{{ $va['goods_meals_detail'] }}
                                                                         </label>
                                                                       </div>
                                                                       @endif
                                                                      @endforeach
                                                                    @endforeach
                                                                  </div>
                                                               <div class="plus_icon1_1  fl" id="check_detail_1"></div>
                                                               <input type="hidden" name="spec_list" value="" /></div>
                                                       </li>
                                                   </ul>
                                               </div>
                                               @endif
                                               <style>#choose{margin:0;} #choose li{overflow:hidden; padding-bottom:0px;} #choose .dt{width:72px; text-align:left; float:left; padding:6px 0 0;} #choose .dd{overflow:hidden;} #choose .dd .item{margin:2px 8px 2px 0; position:relative; padding: 5px;} #choose .dd .item a{border:1px solid #ccc; padding:4px 6px;overflow: visible;display: inline-block} #choose .dd .item a span{padding:0 3px; line-height:30px;} #choose .dd .item a img{width:30px; height:30px;} #choose .dd .item b{width:12px; height:12px; background:url(static/images/gou.png) no-repeat; position:absolute; bottom:0px; right:0px; overflow:hidden; display:none;} #choose .dd .item.selected a{border:2px solid #e4393c; padding:3px 5px; position: relative; overflow: visible;display: inline-block} #choose .dd .item.selected b{display:block;} #choose li.GeneralAttrImg .dt{padding-top:10px;} #choose li.GeneralAttrImg .dd .item a{padding:1px;} #choose li.GeneralAttrImg .dd .item a img{margin:1px;} #choose li.GeneralAttrImg .dd .item.selected a{padding:0;} .check_item{padding: 6px 0;} #check_detail_2{margin-top: 10px}</style>
                                               @if(time()>$goods->goods_sales_end || time() <$goods->goods_sales_start) @else
                                                   <script type="text/javascript">
                                                   function showToEndTime(id, endTime) {

                                                           function formatTime(time) {

                                                               if (time < 0 || time == 0) return location.reload(true);

                                                               if (time > (1825 * 1000 * 60 * 60 * 24)) return "结束时间未知,请留意活动页面观察活动是否";
                                                               var day = Math.floor(time / (1000 * 60 * 60 * 24));
                                                               var hour = Math.floor((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                               var minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));
                                                               var seconds = Math.floor((time % (1000 * 60)) / (1000));
                                                               return day + "天" + hour + "小时" + minutes + "分" + seconds + "秒";
                                                           }

                                                           return function() {
                                                               var time = endTime.split(/-| |:/);
                                                               document.getElementById(id).innerHTML = formatTime(new Date(time[0], time[1] - 1, time[2], time[3], time[4], time[5]) - new Date());
                                                           }
                                                       }
                                                       setInterval(showToEndTime("colockbox1", "{{ date('Y-m-d H:i:s',$goods->goods_sales_end ) }}"), 1000);</script>
                                                      @endif
                                                   <!-- 计算价格 -->
                                                   <script>
                                                   function changePrice() {
                                                           aaa = $("input[name='h1']").val();

                                                           c1 = parseInt(aaa);
                                                           num = $('#number').val();
                                                           nums = parseInt(num);
                                                           ids = $("input[name='che[]']");
                                                           check_val = [];

                                                           for (k in ids) {
                                                               if (ids[k].checked) {
                                                                   check_val.push(ids[k].value);
                                                               }
                                                           }

                                                           if (check_val.length == 0) {
                                                               $('#ss').html(c1 + c1 * (nums - 1));
                                                           } else {
                                                               $.post('/Home/check/meal', {
                                                                   'ids': check_val
                                                               },
                                                               function(msg) {
                                                                   if (msg) {
                                                                       c2 = parseInt(msg);

                                                                       $('#ss').html(c1 + c2 + c1 * (nums - 1));
                                                                   } else {
                                                                       $('#ss').html(c1 + c1 * (nums - 1));
                                                                   }
                                                               });
                                                           }
                                                       }
                                                     </script>
                                                   <script>
                                                   $(document).ready(function() {
                                                           $("#show_details").click(function() {
                                                               $(".details .item:gt(0)").toggle();
                                                               $(".details").toggleClass('se');
                                                               $(".plus_icon").toggleClass("minus_icon");
                                                           });
                                                       });
                                                     </script>
                                                   <script>
                                                   $(document).ready(function() {
                                                           $("#show_details_0").click(function() {
                                                               $(".details_0 .item:gt(0)").toggle();
                                                               $(".details").toggleClass('se');
                                                               $(".plus_icon_0").toggleClass("minus_icon_0");
                                                           });
                                                       });
                                                     </script>
                                                   <script>
                                                   $(document).ready(function() {
                                                           $("#show_details_1").click(function() {
                                                               $(".details_1 .item:gt(0)").toggle();
                                                               $(".details").toggleClass('se');
                                                               $(".plus_icon_1").toggleClass("minus_icon_1");
                                                           });
                                                       });
                                                     </script>
                                                   <script>
                                                   $(document).ready(function() {
                                                           $("#show_details_2").click(function() {
                                                               $(".details_2 .item:gt(0)").toggle();
                                                               $(".details").toggleClass('se');
                                                               $(".plus_icon_2").toggleClass("minus_icon_2");
                                                           });
                                                       });
                                                     </script>
                                                   <script>
                                                   $(document).ready(function() {
                                                           $("#show_details_3").click(function() {
                                                               $(".details_3 .item:gt(0)").toggle();
                                                               $(".details").toggleClass('se');
                                                               $(".plus_icon_3").toggleClass("minus_icon_3");
                                                           });
                                                       });
                                                     </script>
                                                   <script>
                                                   $(document).ready(function() {
                                                           $("#check_detail").click(function() {
                                                               $(".check_main .check_item:gt(0)").toggle();
                                                               $(".details").toggleClass('se');
                                                               $(".plus_icon1").toggleClass("minus_icon1");
                                                           });
                                                       });
                                                     </script>
                                                   <script>
                                                   $(document).ready(function() {
                                                           $("#check_detail_1").click(function() {
                                                               $(".check_main_1 .check_item:gt(0)").toggle();
                                                               $(".details").toggleClass('se');
                                                               $(".plus_icon1_1").toggleClass("minus_icon1_1");
                                                           });
                                                       });
                                                     </script>
                                                   <script>
                                                   $(document).ready(function() {
                                                           $("#check_detail_2").click(function() {
                                                               $(".check_main_2 .check_item:gt(0)").toggle();
                                                               $(".details").toggleClass('se');
                                                               $(".plus_icon1_2").toggleClass("minus_icon1_2");
                                                           });
                                                       });
                                                     </script>
                                                   <script>
                                                   $(document).ready(function() {
                                                           $("#check_detail_3").click(function() {
                                                               $(".check_main_3 .check_item:gt(0)").toggle();
                                                               $(".details").toggleClass('se');
                                                               $(".plus_icon1_3").toggleClass("minus_icon1_3");
                                                           });
                                                       });
                                                     </script>
                                                   <!-- countNum->xiaomi_goods.js -->
                                                   <ul class="sku">
                                                       <li class="skunum_li clearfix fl">
                                                           <div class="ghd">数量：</div>
                                                           <div class="skunum gbd" id="skunum" style="width: 250px">
                                                               <span class="minus" title="减少1个数量"></span>
                                                               <input id="number" name="number" type="text" min="1" value="1" onchange="countNums(0)">
                                                               <span class="add" title="增加1个数量"></span>&nbsp;件</div>
                                                       </li>
                                                   </ul>
                                                   <script>function countNums(i) {
                                                           var $count_box = $("#skunum");
                                                           var $input = $count_box.find('input');
                                                           var num = $input.val();
                                                           if (!$.isNumeric(num) || num<1) {
                                                               alert("请您输入正确的购买数量!");
                                                               $input.val('1');
                                                               return;
                                                           }
                                                           num = parseInt(num) + i;
                                                           ku = $("#ku").html();
                                                           stock = parseInt(ku);
                                                           if (num > stock) {
                                                               alert("请您输入正确的购买数量!");
                                                               $input.val('1');
                                                             return;
                                                           }
                                                           switch (true) {
                                                           case num == 0 : $input.val('1');
                                                               alert('您至少得购买1件商品！');
                                                               break;
                                                           default:
                                                               $input.val(num);
                                                               break;
                                                           }

                                                           changePrices();
                                                       }</script>
                                                   <script type="text/javascript">
                                                   function changePrices() {
                                                           var num = $('#number').val();
                                                           var nums = parseInt(num);
                                                           var bbb = $('#ss').html();
                                                           var c3 = parseInt(bbb);
                                                           var aaa = $("input[name='h1']").val();
                                                           var c1 = parseInt(aaa);
                                                           cx = c3 % c1 == 0 ? c1 * nums: (c1 * nums) + (c3 % c1);
                                                           $('#ss').html(cx);
                                                       }
                                                     </script>
                                           </dd>
                                           <div class="clearfix"></div>
                                           <dd class="goods-info-head-cart">
                                             <button class="btn btn-primary goods-add-cart-btn" id="buy_btn"><i class="iconfont"></i>加入购物车</button>
                                             <a href="/user/my_collect_goods/create/{{ $goods->id }}" class=" btn btn-gray  goods-collect-btn " id="fav-btn">
                                                   <i class="iconfont"></i>收藏</a></dd>
                                   </dl>
                               </dt>
                           </dl>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
   <div class="taocan_wrap"></div>
   <div class="full-screen-border"></div>
   <div class="goods-detail-main">
       <div class="goods-detail-nav" id="goodsDetail">
           <div class="container">
               <ul class="detail-list">
                   <li>
                       <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">详情描述</a></li>
                   <li>
                       <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">规格参数</a></li>
                   <li>
                       <a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">用户评价(<small>{{ $U_comments_num }}</small>)</a></li>
               </ul>
           </div>
       </div>
       <div class="product_tabs">
           <div class="goods-detail-desc goods_con_item">
               <div class="container">
                   <div class="shape-container">
                     <style type="text/css">
                       .ixiongmao_pic img{
                         width:80%;
                       }
                     </style>
                       <p style="text-align: center;">
                         <div class="ixiongmao_pic">{!! $details['goods_detail_pic'] !!}</div>
                       </p>
                   </div>
               </div>
             </div>
           <div class="goods-detail-nav-name-block goods_con_item">
               <div class="container main-block">
                   <div class="border-line"></div>
                   <h2 class="nav-name">规格参数</h2></div>
           </div>
           <div class="goods-detail-param">
               <div class="container">
                   <ul class="param-list">
                       <li class="goods-img">
                           <img src="{{ $goods['goods_pic'] }}" alt="{{ $goods['goods_name'] }}" /></li>
                       <li class="goods-tech-spec">
                           <ul>
                             @foreach(explode(',',$details['goods_tail']) as $keys=>$vals)
                               <li>{{ $vals }}</li>
                              @endforeach
                          </ul>
                      </li>
                   </ul>
               </div>
           </div>
           <div class="goods-detail-nav-name-block goods_con_item" id="goodspingjia">
               <div class="container main-block">
                   <div class="border-line"></div>
                   <h2 class="nav-name">用户评价</h2></div>
           </div>
           <div class="goods-detail-comment hasContent z-com-box-head">

                   <div class="goods-detail-comment-content">
                       <div class="container">
                           <div class="row">
                               <div class="span20 goods-detail-comment-list">
                                   <div class="comment-order-title">
                                       <div class="left-title">
                                           <h3 class="comment-name">最有帮助的评价（{{ $U_comments_num }}）</h3></div>
                                   </div>
                                   <ul class="comment-box-list">
                                     <!-- 单个开始 -->
                                     @foreach ($U_comments as $v)
                                      @foreach ($U_Goods_user as $vv)
                                        @if ($vv['id'] == $v['user_id'])
                                       <li class="item-rainbow-3">
                                           <div class="user-image">
                                               <img class="face_img" src="{{ $vv['u_photo'] }}"></div>
                                           <div class="user-name-info">
                                               <span class="user-name">{{ $vv['u_name'] }}</span>
                                               <span class="user-time">{{ date('Y-m-d H:i:s',$v['comment_time']) }}</span>
                                               <span class="pro-info"></span>
                                           </div>
                                           <dl class="user-comment">
                                               <dt class="user-comment-content">
                                                   <p class="content-detail">{{ $v['comment_content'] }}</p></dt>
                                               <span>
                                           </dl>
                                       </li>
                                          @endif
                                        @endforeach
                                       @endforeach
                                       <!-- 单个end -->
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-sm-6" style="text-align:center;">
                       <div class="dataTables_paginate paging_simple_numbers">
                           <ul class="pagination">
                             {!! $U_comments->render() !!}
                           </ul>
                       </div>
                   </div>
                   @if (session('Home_Session'))
                    @foreach ($U_orders as $v)
                    @if (in_array($goods->id,explode(',',$v['goods_id'])))
                      @if ($v['orders_status'] == '2')
                   <div class="goods-detail-comment-groom" style="border-width:0 0 1px 0">
                       <div class="container">
                           <ul class="main-block clearfix">
                                <div class="z-com-box-head">
                                    <div class="z-com-list">
                                        <div></div>
                                    </div>
                                    <div >
                                        <form action="JavaScript:void(0);" method="post">
                                            <ul class="form addr-form">
                                                <li style="float: inherit;">对自己购买过的商品进行评价，它将成为大家购买参考依据。(所有购买过当前商品的用户，可进行评价<small>(已完成评价的不能再进行评价))</li>
                                                <li style="float: inherit;"><label>用户名:</label>{{ $get_session['u_name'] }}</li>
                                                <li style="float: inherit;"><label>评论内容:</label>
                                                    <textarea name="m_content" class="txt" style="height:90px; width:500px;" id="m_content"></textarea>
                                                </li>
                                                <li style="float: inherit;">
                                                    <input type="hidden" name="m_id" value="{{ $get_session['id'] }}" />
                                                    <input type="hidden" name="goods_id" value="{{ $goods->id }}" />
                                                    <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    <input name="" type="submit" value="提交评论" class="btn" style="border:none; height:40px; cursor:pointer; width:150px; font-size:16px;" id="Submit"></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                           </ul>
                       </div>
                   </div>
                    @endif
                   @endif
                   @endforeach
                  @endif
           </div>
       </div>
   </div>
</div>
</div>
</div>
<div class="goods-sub-bar" id="goodsSubBar">
   <div class="container">
       <ul class="detail-list">
           <li>
               <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">详情描述</a></li>
           <li>
               <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">规格参数</a></li>
           <li>
               <a class="J_scrollHref" href="javascript:void(0);" name="pjxqitem" rel="nofollow">用户评价(<em>{{ $U_comments_num }}</em>)</a></li>
       </ul>
       <dl class="goods-sub-bar-info clearfix">
           <dt>
               <img src="{{ $goods->goods_pic }}" alt="{{ $goods->goods_name }}" /></dt>
           <dd>
               <strong>{{ $goods->goods_name }}</strong>
               <p>
                   <em>{{ $goods->goods_discript }}</em></p>
           </dd>
       </dl>
       <!-- <a href="javascript:addToCart(461)" class="btn btn-primary goods-add-cart-btn">
           <i class="iconfont"></i>加入购物车</a>--></div>
</div>
<script type="text/javascript" src="/Home/static/js/touchtouch.jquery.js"></script>
<script type="text/javascript">
$(function() {
       //图片事件,img-gather
       $('#thumbs a').touchTouch();
       $(document).ready(function() {
           $(".yuspeak").mouseover(function() {
               $(this).find(".tan2").css('display', 'block');
           });
           $(".yuspeak").mouseout(function() {
               $(this).find(".tan2").css('display', 'none');
           });
       });
   });

  $(function() {
    $('#Submit').click(function() {
      var m_id = $('input[name=m_id]').val();
      var m_content = $('#m_content').val();
      var goods_id = $('input[name=goods_id]').val();
      $.ajax({
        url:'/User/Comment/Ajax?do=Comment',
        type:'POST',
        data:{'m_id':m_id,'m_content':m_content,'goods_id':goods_id},
        success:function(msg){
          if (msg == 'NotFound') {
            layer.msg('传入的参数不正确，或者页面不存在，请稍后再试。');
          } else {
            if (msg == 'HaveComments') {
              layer.msg('您已评论该商品！');
            } else {
              if (msg == 'Undefined') {
                layer.msg('评论内容不能为空');
              } else {
                layer.msg(msg);
                location.reload(true)
              }
            }
          }

        },
        error:function() {
          layer.msg('服务器出了点小毛病,请重试!');
        },
        dataType:'HTML',
        async:true
      });
    });
  });

  var time = setInterval(function(){
     $.ajax({
         url:'/user/my_browse',
         type:'POST',
         data:{'gid':{{ $goods->id }}},
         success:function(msg){
         },
         dataType:'html',
         async:true
       });
    clearInterval(time)
 },6000)
 </script>
@endsection
