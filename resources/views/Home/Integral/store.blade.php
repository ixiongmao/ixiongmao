@extends('Home.User.Ucommon')

@section('Home_title','积分商品兑换')

@section('User_content')
      <div class="my_nala_centre ilizi_centre">
          <div class="ilizi cle">
              <div class="box">
                  <div class="box_1">
                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                        <form action="/score_goods/store" method="post">
                        {{ csrf_field() }}
                        <h1>@yield('Home_title')</h1>
                        <table style="align:center;" width="100%" border="0" cellpadding="5" cellspacing="1">
                            <tbody>
                                <tr align="center">
                                    <th bgcolor="#ffffff" colspan="3">积分商品</th>
                                  </tr>
                                <tr>
                                    <th>积分商品名称：</th>
                                    <td>{{ $scores_goods['goods_scores_name'] }}</td>
                                    <td rowspan="3"><img style="width:150px;" src="{{ $scores_goods['goods_scores_pic'] }}"></td>
                                    <input type="hidden" name="sgid" value="{{ $scores_goods['id'] }}">
                                </tr>
                                <tr>
                                    <th>件数：</th>
                                    <td>1件</td>
                                </tr>
                                <tr>
                                    <th>所需要积分：</th>
                                    <td>{{ $scores_goods['goods_scores_need'] }}</td>
                                    <input type="hidden" name="jifen_need" value="{{ $scores_goods['goods_scores_need'] }}">
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
                                </tr>
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
@endsection
