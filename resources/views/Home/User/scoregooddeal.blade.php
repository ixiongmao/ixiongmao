@extends('Home.common')

@section('Home_title', '用户中心')

@section('content')
<!-- 以下为在线可视化HTML编辑器js 感谢提供者，开源无私：http://kindeditor.net/ -->
<script charset="utf-8" src="/Editor/kindeditor-all-min.js"></script>
<script charset="utf-8" src="/Editor/lang/zh_CN.js"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

KindEditor.ready(function(K) {
        K.create('#d_content');
        var editor = K.editor();
        K('#picture').click(function() {
            editor.loadPlugin('image',function() {
                editor.plugin.imageDialog({
                    imageUrl: K('#picture').val(),
                    clickFn: function(url, title, width, height, border, align) {
                        K('#picture').val(url);
                        editor.hideDialog();
                    }
                });
            });
        });

    });
</script>
        <link rel="stylesheet" href="/Home/static/css/user/style.css">
        <div class="breadcrumbs">
            <div class="container">
                <a href="/">首页</a>
                <code>&gt;</code>用户中心</div></div>
        <div style="background: #f5f5f5">
            <div id="wrapper" class="container" style="padding-bottom: 41px;">
                <div class="my_nala_main">
                  <!-- 左侧导航start -->
                    <div class="slidebar">
                        <ul class="slide_item">
                          <!-- 左侧导航单个模块start -->
                            <li class="item">
                                <div class="root_node">会员中心</div>
                                <ul>
                                    <li>
                                        <a class="on" href="/user/">我的个人中心</a>
                                        <a class="" href="/user/my_information">用户信息</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- 左侧导航单个模块end -->
                            <!-- 左侧导航单个模块start -->
                              <li class="item">
                                  <div class="root_node">订单中心</div>
                                  <ul>
                                      <li>
                                          <a class="" href="/user/orders">我的订单</a>
                                          <a class="" href="/user/index">收货地址</a>
                                          <a class="" href="/user/aftersale">售后服务</a>
                                      </li>
                                  </ul>
                              </li>
                              <!-- 左侧导航单个模块end -->
                        </ul>
                    </div>
                    <!-- 用户中心内中开始 --> 
                     <div class="my_nala_centre ilizi_centre">
                        <div class="ilizi cle">
                            <div class="box">
                                <div class="box_1">
                                   
                                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                                        <form action="/score_goods/store" method="post">
                                        {{ csrf_field() }}
                                        <h1>积分商品兑换</h1>
                                        <table style="align:center;" width="100%" border="0" cellpadding="5" cellspacing="1">
                                            <tbody>
                                                <tr align="center">
                                                    <th bgcolor="#ffffff" colspan="3">积分商品</th>
                                                  </tr>
                                                <tr>
                                                    <th>积分商品名称：</th>
                                                    <td>{{ $scores_goods['goods_scores_name'] }}</td>
                                                    <td rowspan="2"><img style="width:150px;" src="{{ $scores_goods['goods_scores_pic'] }}"></td>
                                                    <input type="hidden" name="sgid" value="{{ $scores_goods['id'] }}">
                                                </tr>
                                                <tr>
                                                    <th>件数：</th>
                                                    <td>1件</td>
                                                </tr>
                                                <th bgcolor="#ffffff" colspan="3">积分商品收件人信息</th> 

                                                @foreach($user_address as $k=>$v)
                                                <tr>
                                                <td colspan="3">
                                                @if($v['address_status']==1)
                                                <input type="radio" name="add_sn" checked value="{{ $v['id'] }}">
                                                @else
                                                <input type="radio" name="add_sn" checked value="{{ $v['id'] }}">
                                                @endif
                                                姓名：{{ $v['address_name'] }}| 电话：{{ $v['address_phone'] }} | 地址：{{ $v['address_address']}} 
                                                </td>
                                                </tr><br><br>
                                                @endforeach
                                                <tr><td colspan="3"><input class="btn  btn-primary goods-add-cart-btn" type="submit" value="提交"></td></tr>
                                            </tbody>
                                        </table>
                                        
                                        </form>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('User_content')
                    <!-- 用户中心内中结束 -->
                </div>
            </div>
        </div>
    @if (session('Error'))
    <script type="text/javascript">
      layer.msg('{{session('Error')}}');
    </script>
    @endif

    <script type="text/javascript">
    	
    	

    </script>
   
@endsection
