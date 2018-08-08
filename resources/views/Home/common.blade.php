@section('Home_title', $systems['system_name'])
@if ($systems['system_status'] == 1)
<!DOCTYPE html>
<html lang="Zh-cn">

    <head>
        <meta charset="utf-8">
        <title>@yield('Home_title')-{{ $systems['system_name'] }}</title>
        <meta name="Keywords" content="{{ $systems['system_keywords'] }}" />
        <meta name="Description" content="{{ $systems['system_description'] }}" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="/Home/layui/layui/css/layui.css" rel="stylesheet" type="text/css" />
        <link href="/Home/static/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/Home/static/css/category.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/Home/static/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="/Home/static/js/jquery.json.js"></script>
        <script type="text/javascript" src="/Home/static/js/global.js"></script>
        <script type="text/javascript" src="/Home/static/js/easydialog.min.js"></script>
        <!-- <script type="text/javascript" src="/Home/static/js/common_category.js"></script> -->
        <!-- <script type="text/javascript" src="/Home/static/js/check.js"></script> -->
        <script type="text/javascript" src="/Home/static/js/transport_jquery.js"></script>
        <script type="text/javascript" src="/Home/static/js/utils.js"></script>
        <script type="text/javascript" src="/Home/static/js/jquery.superslide.js"></script>
        <script type="text/javascript" src="/Home/static/js/xiaomi_common.js"></script>
        <script type="text/javascript" src="/Home/static/js/jquery.flipcountdown.js"></script>
        <script type="text/javascript" src="/Home/layui/layui/layui.all.js"></script>
        <link rel="stylesheet" href="/Home/static/css/foot.css" type="text/css">
        <script type="text/javascript" src="/Home/static/js/xiaomi_category.js"></script>
        <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>
        <!-- <script type="text/javascript" src="/Home/static/js/xiaomi_index.js"></script> -->
      </head>

    <body style="overflow-x: hidden; background: #fff;">
        <!-- 头部开始 -->
        <div class="site-topbar">
            <div class="container">
                <!-- 左侧头部开始 -->
                <div class="topbar-nav">
                    <a href="/" class="snc-link snc-order">首页</a></div>
                <!-- 左侧头部结束 -->
                <!-- 购物车部分开始 -->
                <div class="topbar-cart" id="ECS_CARTINFO">
                    <a class="cart-mini " href="/shop_car/">
                        <i class="iconfont">&#xe60c;</i>购物车
                        <span class="mini-cart-num J_cartNum" id="hd_cartnum">({{ $Shop_Car_nums }})</span></a>

                    <!-- 有商品 -->
                </div>
                <!-- 购物车部分结束 -->
                @if (session('Home_Session'))
                <!-- 顶部个人信息开始 -->
                <div class="topbar-info J_userInfo" id="ECS_MEMBERZONE">
                    <span class="user">
                        <a class="user-name" target="_blank" >
                            <span class="name">{{ $get_session['u_name'] }}</span>
                            <i class="iconfont"></i></a>
                        <ul class="user-menu" style="display: none;">
                            <li>
                                <a target="_blank" href="/user/index">个人中心</a></li>
                            <li>
                                <a target="_blank" href="/user/my_collect_goods">我的收藏</a></li>
                            <li>
                                <a target="_blank" href="/user/my_browse/index">我的浏览</a></li>
                            <li>
                                <a href="/logout">退出登录</a></li>
                        </ul>
                    </span>
                    <span class="sep">|</span>
                    <a href="/user/my_orders" class="link">我的订单</a></div>
                <!-- 顶部个人信息结束 -->
                @else
                <div class="topbar-info J_userInfo" id="ECS_MEMBERZONE">
                    <a class="link" href="/login" rel="nofollow">登录</a>
                    <span class="sep">|</span>
                    <a class="link" href="/reg" rel="nofollow">注册</a>
                    <span class="sep">|</span></div>
                @endif
            </div>
        </div>
        <!-- 头部结束 -->
        <div class="site-header" style="clear:both;">
            <div class="container">
                <!-- LOGo -->
                <div class="header-log1 fl" style="margin-top:22px; margin-right: 5px">
                    <a href="/" target="_blank">
                        <img src="{{ $systems['system_logo'] }}" style="width:234px;height:100px;width:200px;" /></a>
                </div>
                <!-- LOGo -->
                <!-- 搜索开始 -->
                <div class="header-search fl">
                    <form action="/Search" method="get" id="searchForm" class="search-form clearfix">
                        <label class="hide">站内搜索</label>
                        <input class="search-text" type="text" name="key" value="" autocomplete="off" placeholder="请输入商品名称">
                        <button type="submit" class="search-btn iconfont"></button>
                        <div class="hot-words">
                            <a href="/Search?key=Mac" target="_blank">苹果Mac</a></div>
                    </form>
                </div>
                <!-- 搜索结束 -->
                <div class="clearfix header_mb20"></div>
                <!-- 右侧导航开始 -->
                <div class="header-nav ">
                    <ul class="nav-list feileinew">
                        <li class="nav-category ">
                            <span>全部分类</span>
                            <img class="fr" src="/Home/static/picture/fen.png" style="width: 15px;height: 7px" />
                            <div class="site-category category-hidden">
                                <ul class="site-category-list clearfix" id="site-category-list">
                                    <!-- 左start -->
                                    <!-- 左侧导航栏遍历开始 -->
                                    @foreach($Cate as $k=>$v)
                                    <li class="category-item">
                                      @if(substr_count($v['path'],',')==0)
                                        <a class="title" href="/list/{{ $v['id'] }}">{{ $v['cname'] }}
                                            <i class="iconfont"></i></a>
                                        <div class="children clearfix children_2">
                                            <div class="children-home-quan">
                                                <ul class="children-list">
                                                  @foreach($Cate as $ka=>$va)
                                                    @if($va['pid']==$v['id'])
                                                    <div class="home-category-child-list clearfix">
                                                       <a href="/list/{{ $va['id'] }}" title="" class="home-category-list">{{ $va['cname'] }}
                                                         <i class="iconfont fr"></i></a>
                                                    </div>
                                                    @foreach($Cate as $key=>$val)
                                                      @if($val['pid']==$va['id'])
                                                    <li>
                                                        <!-- 商品分类搜索 -->
                                                        @foreach($good as $kels=>$vals)
                                                          @if($vals['goods_cates']==$val['id'])
                                                        <a class="link" href="/item/{{ $vals['id'] }}">
                                                            <img class="thumb" src="{{ $vals['goods_pic'] }}" width="40" height="40">
                                                            <span>{{ $vals['goods_name'] }}</span></a>
                                                              @endif
                                                            @endforeach</li>
                                                            @endif
                                                          @endforeach
                                                        @endif
                                                      @endforeach</ul>
                                            </div>
                                        </div>
                                      @endif
                                  </li>
                                @endforeach
                                    <!-- 左侧导航栏遍历结束 -->
                                    <!-- 左end -->
                                  </ul>
                              </div>
                        </li>
                    </ul>
                </div>
                <!-- 右侧导航结束 -->
                <!-- 导航开始 -->
                <div class="header-nav nav1">
                    <ul class="nav-list">
                        <!-- 头部导航商品开始 -->
                        @foreach ($Nav_data as $v)
                        <li class="nav-item1">
                            <a class="link" href="{{ $v['nav_url'] }}" target="_blank">
                                <span>{{ $v['nav_name'] }}</span></a>
                        </li>
                        @endforeach
                        <!-- 头部导航商品结束 -->
                    </ul>
                </div>
                <!-- 导航结束 -->
            </div>
        </div>
        <!-- 整体头部结束 -->
        <!-- 继承部分开始 -->
        @yield('content')
        <!-- 继承部分结束 -->
        <div class="footer">
            <div class="container">
                <div class="footer-service clearfix">
                    <div class="service-item item-1">
                        <i>
                        </i>
                        <span class="text">1年免费保修</span></div>
                    <div class="service-item item-2">
                        <i>
                        </i>
                        <span class="text">7天无理由退货</span></div>
                    <div class="service-item item-3">
                        <i>
                        </i>
                        <span class="text">15天免费换货</span></div>
                    <div class="service-item item-4">
                        <i>
                        </i>
                        <span class="text">顺丰包邮</span></div>
                    <div class="service-item item-5">
                        <i>
                        </i>
                        <span class="text">全国365家门店</span></div>
                </div>
                <div class="footer-splite"></div>
                <div class="footer-links clearfix">
                    <dl class="article-link">
                        <dt>驱动下载</dt>
                        <dd>
                            <a target="_blank" href="/downloads">驱动下载</a></dd>
                    </dl>
                    <dl class="article-link">
                        <dt>线下门店</dt>
                        <dd>
                            <a target="_blank" href="/aftersale_site">售后网点</a></dd>
                    </dl>
                    <dl class="article-link">
                        <dt>网站活动</dt>
                        <dd>
                            <a target="_blank" href="/tradein?do=tradein">以旧换新</a></dd>
                    </dl>
                    <dl class="article-link">
                        <dt>友情链接</dt>
                        @foreach ($Links as $k=>$v)
                          @if ($v['links_pic'] == null)
                        <dd><a target="_blank" href="{{ $v['links_url'] }}">{{ $v['links_name'] }}</a></dd>
                        @endif
                      @endforeach
                    </dl>
                    <div class="contact">
                        <h3>联系我们
                            <small>(电话号码)</small></h3>
                        <div class="tel">
                            <div class="number">{{ $systems['system_phone'] }}</div></div>
                        <div class="qrcode clearfix">
                            <div class="qrcode-item">
                                <img src="/Home/static/images/index/foot/erweima.png" alt="" width="110px" height="110px">
                                <p>严选科技公众号</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="friend-links clearfix">
                    <div class="fl c_ccc">友情链接：</div>
                    <ul class="fl">
                      @foreach ($Links as $k=>$v)
                        @if ($v['links_pic'] != null)
                          <li class="fl">
                              <a href="{{ $v['links_url'] }}" target="_blank">
                                  <img src="{{ $v['links_pic'] }}" alt="{{ $v['links_name'] }}" title="{{ $v['links_name'] }}" width="80px" height="40px"></a>
                          </li>
                        @endif
                      @endforeach</ul>
                </div>
              <a href="https://github.com/ixiongmao/ixiongmao" target="_blank"><img src="/github.png" alt="" style="width:50px;margin-left:48%;" title="GitHub"></a>
                <div class="footer-copyright">{!! $systems['system_copyright'] !!}</div></div>
        </div>
        <style type="text/css">/*回到顶部*/ #back-to-top { color:#fff; position:fixed; bottom:20px; right:47px; z-index:99; display:none; text-align:center; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; -o-border-radius:2px; z-index:10000; height:45px; width:45px; background-color:#c01734; background-repeat:no-repeat; background-position:center; transition:background-color 0.1s linear; -moz-transition:background-color 0.1s linear; -webkit-transition:background-color 0.1s linear; -o-transition:background-color 0.1s linear; } #back-to-top i { padding-top:12px; font-size:17px; } #back-to-top:hover { background:#B86662; background:#c01734; }</style>
        <a href="#top" id="back-to-top">
            <i class="layui-icon" style="font-size: 30px;">&#xe619;</i></a>
        <script type="text/javascript">//回到顶部
            //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
            $(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 300) {
                        $('#back-to-top').fadeIn('slow');
                    } else {
                        $('#back-to-top').fadeOut('slow');
                    }
                });
                $('#back-to-top').click(function() {
                    $("html, body").animate({
                        scrollTop: 0
                    },
                    600);
                    return false;
                });
            });
          </script>
          @if (session('Notice'))
            <script type="text/javascript">
              layer.msg('{{session('Notice')}}');
            </script>
          @endif
      
      	<link href="/Home/static/css/kefu.css" rel="stylesheet" type="text/css" />
        <a target="_blank" href="//wpa.qq.com/msgrd?v=3&uin={{ $systems['system_qq'] }}&site=qq&menu=yes">
          <div class="livechat-girl animated" style="margin-bottom: 65px;"> <img class="girl" src="/Home/static/images/kefu.png">
          <div class="livechat-hint rd-notice-tooltip rd-notice-type-success rd-notice-position-left single-line show_hint">
            <div class="rd-notice-content">嘿，我来帮您！</div>
          </div>
          <div class="animated-circles">
            <div class="circle c-1"></div>
            <div class="circle c-2"></div>
            <div class="circle c-3"></div>
          </div>
        </div></a>

      <script type="text/javascript">
      $(function() {
        setInterval(function(){
            if($(".animated-circles").hasClass("animated")){
                $(".animated-circles").removeClass("animated");
            }else{
                $(".animated-circles").addClass('animated');
            }
        },3000);
        var wait = setInterval(function(){
            $(".livechat-hint").removeClass("show_hint").addClass("hide_hint");
            clearInterval(wait);
        },4500);
        $(".livechat-girl").hover(function(){
            clearInterval(wait);
            $(".livechat-hint").removeClass("hide_hint").addClass("show_hint");
        },function(){
            $(".livechat-hint").removeClass("show_hint").addClass("hide_hint");
        });
      });

</script>
    </body>
</html>
@else
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>网站维护中！</title>
    </head>
    <body>
      <script type="text/javascript" src="//qzonestyle.gtimg.cn/qzone/hybrid/app/404/search_children.js" charset="utf-8"></script>
    </body>
  </html>
@endif
