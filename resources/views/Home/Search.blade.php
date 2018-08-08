@extends('Home.common')

@section('Left_Nav')
    @parent
@endsection

@section('content')
    <!-- 分类导航开始 -->
    <div class="breadcrumbs">
      <div class="container">
        <a href="/">首页</a>
        <code>&gt;</code>
        <a href="/">商品搜索：{{ $Sdata }}</a></div>
    </div>
    <!-- 分类导航结束 -->
    <div class="content">
      <div class="container">
        @if ($Search->first())
        <div class="order-list-box clearfix">
            <ul class="order-list">
              @if ($jiage == 'asc')
                <li class="active">
                  <a title="价格" href="/Search?key={{ $Sdata }}&jiage=desc" class="curr" rel="nofollow">
                    <span class="search_ASC">价格</span><i class="iconfont"></i></a>
                </li>
              @elseif ($jiage == 'desc')
                <li class="active">
                  <a title="价格" href="/Search?key={{ $Sdata }}&jiage=asc" class="curr" rel="nofollow">
                    <span class="search_DESC">价格</span><i class="iconfont"></i></a>
                </li>
              @else
                <li>
                  <a title="价格" href="/Search?key={{ $Sdata }}&jiage=asc" rel="nofollow">
                    <span>价格</span></a>
                </li>
              @endif
            </ul>
        </div>

          <div class="goods-list-box">
            <div class="goods-list clearfix">
              <!-- 单个商品start -->
              @foreach ($Search as $k=>$v)
              <div class="goods-item">
                <div class="figure figure-img">
                  <a href="/item/{{ $v['id'] }}">
                    <img src="{{ $v['goods_pic'] }}" alt="{{ $v['goods_name'] }}" class="goodsimg" /></a>
                </div>
                <h2 class="title">
                  <a href="/item/{{ $v['id'] }}" title="{{ $v['goods_name'] }}">{{ $v['goods_name'] }}</a></h2>
                <p class="desc">{{ $v['goods_discript'] }}</p>
                @if ($v['goods_sales_status'] == 0)
                <p class="price">价格
                  <font class="shop_s">{{ $v['goods_price'] }}</font></p>
                @elseif ($v['goods_sales_status'] == 1)
                  <p class="price">促销价
                    <font class="shop_s">{{ $v['goods_sales_price'] }}</font></p>
                @endif
                <div class="thumbs J_attrImg">
                  <div style="width:212px;margin:0 auto;">
                    <ul class="thumb-list clearfix J_imgList">
                      <li class="active">
                        <a>
                          <img src="{{ $v['goods_pic'] }}" width="34" height="34"></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="actions clearfix">
                  <a href="/user/my_collect_goods/create/{{ $v['id'] }}" class="btn-like J_likeGoods">
                    <i class="iconfont"></i>
                    <span>收藏</span></a>
                </div>
                <!-- <div class="flags">
                  <div class="flag flag-saleoff">7.5折促销</div>
                </div> -->
              </div>
              @endforeach
              <!-- 单个商品end -->
            </div>
          </div>
          @else
          <div class="container">
               <p class="empty">无法搜索到您要找的商品！</p></div>
          @endif
          <div class="col-sm-6" style="float:  right;">
              <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                  <ul class="pagination">
                    {!! $Search->appends(['key'=>$Sdata,'jiage'=>$jiage])->render() !!}
                  </ul>
              </div>
          </div>

      </div>
    </div>
@endsection
