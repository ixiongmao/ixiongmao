@extends('Home.common')

@section('Left_Nav')
    @parent
@endsection

@section('content')
<link rel="stylesheet" href="/Home/static/css/index.css" type="text/css" />
<link rel="stylesheet" href="/Home/static/css/seckill.css" type="text/css">
<div class="home-hero-container">
    <div class="home-hero">
        <!-- 幻灯片start -->
        <div class="home-hero-slider">
            <div id="J_homeSlider" style="overflow:hidden;">
                <div class="bd">
                    <ul>
                      @foreach ($banner as $k=>$v)
                        <li _src="url({{ $v['banner_pic'] }})" style="background:#f8f8f8 center 0 no-repeat;height:460px">
                            <a target="_blank" href="{{ $v['banner_url'] }}"></a></li>
                      @endforeach
                  </ul>
                </div>
                <div class="hd">
                    <ul></ul>
                </div>
                <span class="prev"></span>
                <span class="next"></span>
            </div>
        </div>
        <!-- 幻灯片end -->
        <div class="home-hero-sub row container" style=" margin:0 auto; margin-top:15px;">
            <div class="span4 Zspan4">
                <ul class="home-channel-list clearfix">
                    <li>
                        <a href="/tradein?do=tradein" target="_blank">
                            <i class="iconfont">
                                <img src="/Home/static/picture/liwu1.png" alt="" /></i>以旧换新</a>
                    </li>
                    <li>
                        <a href="/downloads" target="_blank">
                            <i class="iconfont">
                                <img src="/Home/static/picture/sctb2.png" alt="" /></i>驱动下载</a>
                    </li>
                    <li>
                        <a href="/service_standard">
                            <i class="iconfont">
                                <img src="/Home/static/picture/sctb3.png" alt="" /></i>服务标准</a>
                    </li>
                    <li>
                        <a href="/aftersale_site" target="_blank">
                            <i class="iconfont">
                                <img src="/Home/static/picture/sctb4.png" alt="" /></i>售后网点</a>
                    </li>
                </ul>
            </div>
            <!-- 右侧部分start -->
            <div class="span16 span21">
                <!-- 广告区start -->
                <ul class="home-promo-list">
                  @foreach ($guanggao as $k=>$v)
                    <li class="first">
                        <a href="{{ $v['ad_url'] }}" target='_blank'><img src="{{ $v['ad_pic'] }}" width='316' height='170' border='0' /></a>
                    </li>
                  @endforeach
                </ul>
                <!-- 广告区end -->
                <!-- 新闻区 -->
                <div class="news_content">
                    <span class="news_title">快报</span>
                    <a style="float:right;" href="/news" target="_blank">更多</a>
                    <div class="clearfix"></div>
                    <ul>
                        <!-- 单个start -->
                        @foreach ($News as $k=>$v)
                        <ul>
                            <p style="white-space: nowrap;overflow:  hidden;text-overflow:  ellipsis;">
                              <span style="color: #b60005">【新闻】</span>
                              <a href="/news/{{ $v['id'] }}" target="_blank" title="{{ $v['news_name'] }}">{{ $v['news_name'] }}</a>
                            </p>
                        </ul>
                        @endforeach
                        <!-- 单个end --></ul></div>
                <!-- 新闻区 -->
                <div class="clearfix"></div>
            </div>
            <!-- 右侧部分end -->
          </div>
    </div>
    <!-- 每日推荐start -->
    <div class="xm-plain-box iflashbuy container">
        <div class="box-hd">
            <h2 class="title">每日促销</h2>
            <div class="more">
                <div class="xm-controls xm-controls-line-small xm-carousel-controls">
                    <a class="control control-prev iconfont" href="javascript: void(0);"></a>
                    <a class="control control-next iconfont" href="javascript: void(0);"></a></div>
            </div>
        </div>
        <div class="box-bd" style="margin:0 auto;margin-bottom: 15px;">
            <div class="box-bd" style="width: 1240px">
                <div class="xm-carousel-wrapper iflashbuy">
                    <ul class="xm-carousel-list xm-carousel-col-5-list goods-list rainbow-list clearfix J_carouselList">
                        <!-- 单个轮播商品start -->
                        @foreach ($Promotion as $k=>$v)
                      	 @if($v['goods_sales_status'] && time() < $v['goods_sales_end'] && time() > $v['goods_sales_start'])
                        <li class="" style="position: relative">
                            <a class="thumb thumb_time" href="/item/{{ $v['id'] }}" target="_blank">
                                <img src="{{ $v['goods_pic'] }}" width="160px" height="160px"/></a>
                            <a>
                                <h3 class="iflashbuyTitle">
                                    <a href="/item/{{ $v['id'] }}" target="_blank">{{ $v['goods_name'] }}</a></h3>
                            </a>
                            <a>
                                <p style="text-align: center" class=" ellipsis">{{ $v['goods_discript'] }}</p></a>
                            <div class="iflashbuyPrice">
                                <a>
                                    <span class="killPrice">￥{{ $v['goods_sales_price'] }}</span>&nbsp;
                                    <span class="killPrice">元</span>&nbsp;&nbsp;
                                    <del class="delPrice">￥{{ $v['goods_price'] }}元</del></a>
                            </div>
                        </li>
                          @endif
                        @endforeach
                        <!-- 单个轮播商品end -->
                      </ul>
                    </div>
            </div>
        </div>
    </div>
    <!-- 每日推荐end -->
    <div class="home-star-goods xm-carousel-container container"></div>
</div>
<div class="page-main home-main">
    <div class="container">
        <!-- 商品显示列表类start -->
        @foreach($I_Cates as $v)
          @if(substr_count($v['path'],',') == 0)
        <div class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
            <div class="box-hd">
                <h2 class="title">{{ $v['cname'] }}</h2>
                <div class="more J_brickNav">
                    <a class="more-link" href="/list/{{ $v['id'] }}" style=" display:inline-block;">查看全部
                        <i class="iconfont"></i></a>
                    <ul class="tab-list J_brickTabSwitch">
                        <li class="tab-active">热门</li>
                        @foreach ($I_Cates as $vv)
                          @if ($vv['pid'] == $v['id'])
                        <li>{{ $vv['cname'] }}</li>
                          @endif
                        @endforeach</ul></div>
            </div>
            <div class="box-bd J_brickBd">
                <div class="row">
                    <div class="span16">
                        <ul class="brick-list clearfix">
                            <!-- 商品显示start -->
                            @foreach ($I_Cates as $vvv)
                              @if ($vvv['pid'] == $v['id'])
                                @foreach ($cate3 as $vvvv)
                                  @if ($vvvv['pid'] == $vvv['id'])
                                    @foreach ($I_Goods as $val)
                                      @if ($val['goods_cates'] == $vvvv['id'])
                                        @if ($val['goods_status'] == 1)
                            <li class="brick-item brick-item-m p_relative">
                              @if((time() < $val[ 'goods_sales_end']) && (time()>$val['goods_sales_start']))
                                <span class="text_center_red">限时秒杀</span>
                              @endif
                                <div class="figure figure-img">
                                    <a href="/item/{{ $val['id'] }}" target="_blank">
                                        <img src="{{ $val['goods_pic'] }}" width="160" height="160" alt="{{ $val['goods_name'] }}"></a></div>
                                <h3 class="title">
                                    <a href="/item/{{ $val['id'] }}" target="_blank">{{ $val['goods_name'] }}</a></h3>
                                <p class="desc">{{ $val['goods_discript'] }}</p>
                                <p class="seckillprice" style="text-align:center;">￥{{ $val['goods_price'] }}</p>
                              </li>
                                @endif
                              @endif
                            @endforeach
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                            <!-- 商品显示end --></ul>
                        <!-- 二级分类start -->
                        @foreach ($I_Cates as $va)
                         @if ($va['pid'] == $v['id'])
                        <ul class="brick-list clearfix">
                            <!-- 商品显示start -->
                            @foreach ($I_Cates as $val)
                              @if ($val['pid'] == $va['id'])
                                @foreach ($I_Goods as $valu)
                                  @if ($valu['goods_cates'] == $val['id'])
                                    @if ($valu['goods_status'] == 1)
                            <li class="brick-item brick-item-m">
                              @if((time() < $valu[ 'goods_sales_end']) && (time() > $valu['goods_sales_start']))
                                <span class="text_center_red">限时秒杀</span>@endif
                                <div class="figure figure-img">
                                    <a href="/item/{{ $valu['id'] }}" target="_blank">
                                        <img src="{{ $valu['goods_pic'] }}" width="160" height="160" alt=""></a></div>
                                <h3 class="title">
                                    <a href="/item/{{ $valu['id'] }}">{{ $valu['goods_name'] }}</a></h3>
                                <p class="desc">{{ $valu['goods_discript'] }}</p>
                                <p class="seckillprice" style="text-align:center;">￥{{ $valu['goods_price'] }}</p>
                              </li>
                                @endif
                              @endif
                            @endforeach
                          @endif
                        @endforeach
                            <!-- 商品显示end -->
                          </ul>
                          @endif
                        @endforeach
                        <!-- 二级分类end -->
                      </div>
                    </div>
            </div>
        </div>
        @endif
      @endforeach
        <!-- 商品显示列表类end -->
      </div>
</div>
@endsection
