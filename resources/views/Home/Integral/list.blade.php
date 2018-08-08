@extends('Home.User.Ucommon')

@section('Home_title','积分记录')

@section('User_content')
<link rel="stylesheet" href="/Home/static/css/user/base.css">
<link rel="stylesheet" href="/Home/static/css/user/home.css">
      <div class="my_nala_centre ilizi_centre">
          <div class="ilizi cle">
              <div class="box">
                  <div class="box_1">
                      <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                          <h1>@yield('Home_title')</h1>
                          <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                              <tbody>
                                  <tr align="center">
                                      <td bgcolor="#ffffff">积分</td>
                                      <td bgcolor="#ffffff">积分来源/去向</td>
                                      <td bgcolor="#ffffff">时间</td></tr>
                                      @foreach($U_score_data as $v)
                                  <tr align="center">
                                      <td bgcolor="#ffffff">{{ $v['score'] }}</a></td>
                                      <td bgcolor="#ffffff">
                                        @if($v['source']==1)
                                          您购买商品<font color="#06c1ae"><strong>获得</strong></font>的积分
                                        @endif
                                        @if($v['source']==2)
                                          您兑换商品<font color="red"><strong>消费</strong></font>的积分
                                        @endif</td>
                                      <td bgcolor="#ffffff">{{ date('Y-m-d H:i:s',$v['update']) }}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                          </table>
                          <div class="col-sm-6" style="margin-top: -30px;">
                              <div class="dataTables_paginate paging_simple_numbers">
                                  <ul class="pagination">{!! $U_score_data -> render() !!}</ul></div>
                          </div>
                      </div>
                      <div style="height:30px;"></div>
       					 <h1 style="margin-left: 30px;">可点击积分商品进行兑换</h1>
      	                <div class="aui-content-max">
                          <div class="aui-content-box">
                              <div class="prev">
                                  <a href="javascript:void(0)">
                                      <img src="/Home/static/images/img/prev.png" alt=""></a>
                              </div>
                              <div class="aui-content-box-ovf">
                                  <div class="aui-content-box-list">
                                      <ul>
                                        @foreach ($Score_goods_data as $v)
                                          <li>
                                              <a href="/scoregoods/scoredeal/{{ $v['id']}}">
                                                  <div class="aui-content-item-img">
                                                      <img src="{{ $v['goods_scores_pic']}}" alt=""></div>
                                                  <p class="aui-content-item-name">{{ $v['goods_scores_name']}}</p>
                                                  <div class="aui-content-price">
                                                      <span class="aui-content-price-new">
                                                          <span>{{ $v['goods_scores_need']}}</span><i>积分</i></span>
                                                      <span class="aui-content-price-origin">
                                                          <i>¥</i>
                                                          <span>{{ $v['goods_scores_price']}}</span></span>
                                                  </div>
                                              </a>
                                          </li>
                                          @endforeach
                                      </ul>
                                  </div>
                              </div>
                              <div class="next">
                                  <a href="javascript:void(0)">
                                      <img src="/Home/static/images/img/next.png" alt=""></a>
                              </div>
                          </div>
                      </div>
                      <script type="text/javascript">//商品滚动
                          $(function() {

                              $(".next a").click(function() {
                                  nextscroll()
                              });

                              function nextscroll() {

                                  var vcon = $(".aui-content-box-list ");

                                  var offset = ($(".aui-content-box-list li").width()) * -1;

                                  vcon.stop().animate({
                                      left: offset
                                  },
                                  "slow",
                                  function() {

                                      var firstItem = $(".aui-content-box-list ul li").first();

                                      vcon.find("ul").append(firstItem);

                                      $(this).css("left", "0px");

                                      circle()

                                  });

                              };

                              function circle() {

                                  var currentItem = $(".aui-content-box-list ul li").first();

                                  var currentIndex = currentItem.attr("index");

                                  $(".circle li").removeClass("circle-cur");

                                  $(".circle li").eq(currentIndex).addClass("circle-cur");

                              }

                              $(".prev a").click(function() {

                                  var vcon = $(".aui-content-box-list ");

                                  var offset = ($(".aui-content-box-list li").width() * -1);

                                  var lastItem = $(".aui-content-box-list ul li").last();

                                  vcon.find("ul").prepend(lastItem);

                                  vcon.css("left", offset);

                                  vcon.animate({
                                      left: "0px"
                                  },
                                  "slow",
                                  function() {

                                      circle()

                                  })

                              });

                          });</script>
                  </div>
              </div>
          </div>
      </div>
@endsection
