@extends('Home.User.Ucommon')

@section('Home_title','我的收藏')

@section('content')
                    <!-- 用户中心内中开始 -->
                     <div class="my_nala_centre ilizi_centre">
                        <div class="ilizi cle">
                            <div class="box">
                                <div class="box_1">

                                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                                        <div>
                                        <ul style="float: left;list-style-type: none;">
                                            <li style="float:left;width:130px;height:35px;background:gray;margin-right: 2px;text-align:center;line-height:30px;font-size:20px;color:red;">我的积分记录</li>
                                            <li style="float:left;width:130px;height:35px;background:gray;margin-right: 2px;text-align:center;line-height:30px;font-size:20px;color:red;">积分统计</li>
                                            <li style="float:left;width:130px;height:35px;background:gray;margin-right: 2px;text-align:center;line-height:30px;font-size:20px;color:red;">兑换详情</li>
                                        </ul>
                                        <hr>
                                        </div><br><br>
                                        <div class="div1">
                                            <div>
                                                <table style="align:center;" width="100%" border="0" cellpadding="5" cellspacing="1">
                                                    <tbody>
                                                        <tr align="center">
                                                            <td>序号</td>
                                                            <td>积分</td>
                                                            <td bgcolor="#ffffff">积分来源/去向</td>
                                                            <td bgcolor="#ffffff">操作时间</td>
                                                          </tr>
                                                          @foreach($score as $k=>$v)
        				                    			<tr align="center">
        				                    				<td>{{$k+1}}</td>
        				                    				<td>{{ $v['score'] }}</td>

                                                            @if($v['source']==1)
                                                            <td> 您购买商品<b>获得</b>的积分 </td>
                                                            @endif
                                                            @if($v['source']==2)
                                                            <td> 您兑换商品消费的积分 </td>
                                                            @endif

        				                    				<td>{{ $v['update'] }}</td>
        				                    			</tr>
        				                    			@endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6" style="margin-top: -30px;">
    									        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
    									            <ul class="pagination">
    									              {!! $score->render() !!}
    									            </ul>
    									          </div>
    									    </div>
                                            <div class="clearfix">
                                                <div id="pager" class="pagebar">
                                                    <span class="f_l f6" style="margin-right:10px;">总计
                                                        <b>{{ $num }}</b>个记录</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div2">
                                            <div>
                                                <table style="align:center;" width="100%" border="0" cellpadding="5" cellspacing="1">
                                                    <tbody>
                                                        <tr align="center">
                                                            <th>累计获取积分</th>
                                                            <th>累计消费积分</th>
                                                            <th>剩余积分</th>
                                                        </tr>
                                                        <tr align="center">
                                                            <td>{{ $g_score_add }}</td>
                                                            <td>{{ $g_score_cut }}</td>
                                                            <td>{{ $g_score_dif }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="div3">
                                            <div>
                                                <table style="align:center;" width="100%" border="0" cellpadding="5" cellspacing="1">
                                                    <tbody>
                                                        <tr align="center">
                                                            <th>序号</th>
                                                            <th>兑换商品</th>
                                                            <th>订单编号</th>
                                                            <th>订单状态</th>
                                                            <th>兑换时间</th>
                                                        </tr>
                                                        @foreach($g_score_order as $k1=>$v1)
                                                        <tr align="center">
                                                            <td>{{ $k }}</td>
                                                            @foreach($s_goods as $k2=>$v2)
                                                            @if($v1['sgid']==$v2['id'])
                                                            <td>{{ $v2['goods_scores_name'] }}</td>
                                                            @endif
                                                            @endforeach
                                                            <td>{{ $v1['order_sn'] }}</td>
                                                            @if($v1['order_status']==0)
                                                            <td>已下单</td>
                                                            @elseif($v1['order_status']==1)
                                                            <td>已发货</td>
                                                            @else
                                                            <td>已完成</td>
                                                            @endif
                                                            <td>{{ $v1['order_time'] }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6" style="margin-top: -30px;">
                                                <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                                    <ul class="pagination">

                                                    </ul>
                                                  </div>
                                            </div>
                                            <div class="clearfix">
                                                <div id="pager" class="pagebar">
                                                    <span class="f_l f6" style="margin-right:10px;">总计
                                                        <b></b>个记录</span>
                                                </div>
                                            </div>
                                        </div>
                                     </div>


                                    <script type="text/javascript">
                                        /*$('.div2').hide();
                                        $('.div3').hide();*/

                                        $('li:eq(0)').click(function(){
                                            $('.div1').show();
                                            $('.div2').hide();
                                            $('.div3').hide();
                                        })

                                        $('li:eq(1)').click(function(){
                                            $('.div1').hide();
                                            $('.div2').show();
                                            $('.div3').hide();
                                        })

                                        $('li:eq(2)').click(function(){
                                            $('.div1').hide();
                                            $('.div2').hide();
                                            $('.div3').show();
                                        })


                                    </script>


                                        <!-- 积分商城部分开始  -->
                                    <div class="xm-plain-box yiyuan-zone" style="width:85%;margin: 0 auto">
                                        <div class="box-hd">
                                            <h2 class="title">
                                                <a href="">积分商品</a>
                                            </h2>
                                            <div class="more">
                                                <div class="xm-controls xm-controls-line-small xm-carousel-controls">
                                                    <a class="control control-prev iconfont prevStop" href="javascript: void(0);" style="background: none;border-radius: 0px"></a>
                                                    <a class="control control-next iconfont" href="javascript: void(0);" style="background: none;border-radius: 0px"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-bd">
                                            <div class="xm-carousel-wrapper J_carouselWrap">
                                                <div class="tempWrap" style="overflow:hidden; position:relative; width:864px">
                                                    <ul class="xm-carousel-list xm-carousel-col-5-list goods-list rainbow-list clearfix J_carouselList" style="width: 1440px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: 0px;">
                                                        @foreach($s_goods as $ka=>$va)
                                                         <li style="float: left; width: 252px;">
                                                            <a class="thumb" href="" target="_blank">
                                                                <img src="{{ $va['goods_scores_pic'] }}" onerror="javascript:this.src=''">
                                                            </a>
                                                            <h3 class="title">
                                                                <a href="../" target="_blank">{{ $va['goods_scores_name'] }}</a>
                                                            </h3>
                                                            <span class="duo_detail_jie">{{ $va['goods_scores_discript'] }}</span>
                                                            <p style="text-align:center;margin: 5px auto;display: inline-block;">
                                                                <span class="price fl" style="width: 50px">所需积分：{{ $va['goods_scores_need'] }}</span>
                                                                <span class="rank fl" style="width: 100px;border: 0;margin-top: 1px">价值￥:{{ $va['goods_scores_price']}} </span>
                                                            </p>
                                                            <h3 class="title">
                                                                <a href="../scoregoods/scoredeal/{{ $va['id'] }}" class="btn  btn-primary goods-add-cart-btn" target="_blank">立即兑换</a>
                                                            </h3>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 积分商城部分结束 -->
                                </div>
                            </div>
                        </div>
                    </div>

@endsection
