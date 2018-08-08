@extends('Home.common')

@section('Home_title', $F_Cates['cname'])

@section('Left_Nav')
    @parent
@endsection

@section('content')
      <!-- 分类导航开始 -->
      <div class="breadcrumbs">
          <div class="container">
              <a href="/">首页</a>
              <code>&gt;</code>
              <a href="$F_Cates['id']">{{ $F_Cates['cname'] }}</a></div>
      </div>
      <!-- 分类导航结束 -->
      <div class="content">
          <div class="container">
              <!-- <script type="text/javascript">$(document).ready(function() {
              var $tab_li = $('.kaishi span');
              $tab_li.click(function() {
              $(this).addClass('selectheader').siblings().removeClass('selectheader');
              });
              });</script> -->
                  <div class="goods-list-box">
                      <div class="goods-list clearfix">
                        @foreach($L_Goods as $vvv)
                          <div class="goods-item">
                              <div class="figure figure-img">
                                @if((time() < $vvv[ 'goods_sales_end']) && (time()>$vvv['goods_sales_start']))
                                      <span class="text_center_red">限时秒杀</span>
                                @endif
                                      <a href="/item/{{ $vvv['id'] }}">
                                          <img src="{{ $vvv['goods_pic'] }}" alt="{{ $vvv['goods_name'] }}" class="goodsimg" /></a></div>
                              <h2 class="title" style="line-height: 35px;">
                                  <a href="/item/{{ $vvv['id'] }}" title="{{ $vvv['goods_name'] }}">{{ $vvv['goods_name'] }}</a></h2>
                              <p class="desc">{{ $vvv['goods_discript'] }}</p>
                              @if ($vvv['goods_sales_status'] == '1')
                              <p class="price" style="line-height: 35px;font-size: 16px;">促销价
                                  <font class="shop_s">{{ $vvv['goods_sales_price'] }}</font></p>
                              <input type="hidden" name="id" value="{{ $vvv['id'] }}">@else
                              <p class="price" style="line-height: 35px;font-size: 16px;">平台价
                                  <font class="shop_s">{{ $vvv['goods_price'] }}</font></p>
                              <input type="hidden" name="id" value="{{ $vvv['id'] }}">@endif
                              <div class="actions clearfix">
                                  <a href="/user/my_collect_goods/create/{{ $vvv['id'] }}" class="btn-like J_likeGoods">
                                      <i class="iconfont"></i>
                                      <span>收藏</span></a>
                              </div>
                                @if((time() < $vvv[ 'goods_sales_end']) && (time()>$vvv['goods_sales_start']))
                                  <div class="flags">
                                      <div class="flag flag-saleoff" style="text-align:  center;">促销价</div>
                                </div>
                                  @endif
                                </div>
                          @endforeach
                        </div>
                  </div>
              <div class="col-sm-6" style="float:  right;">
                  <div class="dataTables_paginate paging_simple_numbers">
                      <ul class="pagination">{!! $L_Goods->render() !!}</ul></div>
              </div>
          </div>
      </div>
     </div>
@endsection
