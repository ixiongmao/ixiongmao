@extends('Home.User.Ucommon')

@section('User_content')
                    <div class="my_nala_centre ilizi_centre">
                        <div class="ilizi cle">
                            <div class="box">
                                <div class="box_1">
                                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%; font-size:14px;">
                                        <div class="user-card">
                                            <h2 class="username">欢迎你，{{ $U_user['u_name'] }}</h2>
                                            <p class="tip" style="margin-top: 10px">
                                              <script type="text/javascript">
                                              function dtime() {
                                                      //获取当前的时间
                                                      var tdate = new Date;
                                                      //获取当前小时
                                                      var ho = tdate.getHours();
                                                      if (ho < 6) {
                                                          document.write('凌晨了，该休息了，安');
                                                      } else if (ho < 9) {
                                                          document.write('早晨好：');
                                                      } else if (ho < 11) {
                                                          document.write('上午好：');
                                                      } else if (ho < 13) {
                                                          document.write('中午好：');
                                                      } else if (ho < 17) {
                                                          document.write('下午好：');
                                                      } else if (ho < 18) {
                                                          document.write('傍晚好：');
                                                      } else if (ho < 22) {
                                                          document.write('晚上好：');
                                                      } else {
                                                          document.write('夜里好,该去休息了：');
                                                      }
                                                  }
                                                  dtime();
                                                </script>
                                              {{ $U_user['u_name']}}~</p>
                                            <img class="avatar" src="{{ $U_user['u_photo'] }}"></div>
                                        <div class="user-actions">
                                            <ul class="action-list">
                                                <li>绑定手机：{{ substr_replace($U_user['u_phone'],'*****',3,5) }}</li>
                                                <li>您的余额: {{ $U_user['u_money']}}</li>
                                                <li>您的积分:  @if (empty($U_scoure))
                                                     	0
                                                      @else
                                                      {{ $U_scoure }}
                                                      @endif</li>
                                                <li style="color: #B9000F">
                                                    <a href="/user/my_information" style="text-align:center;color: #fff;background: #B9000F;border-radius: 3px;line-height: 30px;height: 30px;width: 180px;display: inline-block">修改个人资料</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="portal-sub">
                                        <ul class="info-list clearfix" style="margin-left: 30px">
                                            <li>
                                                <h3>余额：
                                                    <span class="num">{{ $U_user['u_money'] }}</span></h3>
                                                <a href="/user/my_balance_records?Records=balance">查看我的消费记录
                                                    <i class="iconfont"></i></a>
                                                <img src="/Home/static/images/user/index/portal-icon-1.png"></li>
                                            <li>
                                                <h3>积分：
                                                    <span class="num">
                                                      @if (empty($U_scoure))
                                                     	0
                                                      @else
                                                      {{ $U_scoure }}
                                                      @endif
                                                  </span></h3>
                                                <a href="/score/scoreInfo">查看我账户的积分
                                                    <i class="iconfont"></i></a>
                                                <img src="/Home/static/images/user/index/portal-icon-2.png"></li>
                                            <li>
                                                <h3>订单：
                                                    <span class="num">{{ $U_oreders }}</span></h3>
                                                    <a href="/user/my_orders">查看我的订单
                                                        <i class="iconfont"></i></a>
                                                <img src="/Home/static/images/user/index/portal-icon-3.png"></li>
                                            <li>
                                                <h3>收藏：
                                                        <span class="num">{{ $U_collect_goods }}</span></h3>
                                                    <a href="/user/my_collect_goods">查看我收藏的商品
                                                        <i class="iconfont"></i></a>
                                                    <img src="/Home/static/images/user/index/portal-icon-4.png"></li>
                                        </ul>
                                    </div>
                                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                                        <h1>我的登录记录</h1>
                                        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                            <tbody>
                                                <tr align="center">
                                                    <td bgcolor="#ffffff">备注</td>
                                                    <td bgcolor="#ffffff">IP/所属地</td>
                                                    <td bgcolor="#ffffff">时间</td>
                                                </tr>
                                                @foreach ($U_dlrecords as $v)
                                                <tr align="center">
                                                    <td bgcolor="#ffffff">{{ $v['user_remark'] }}</td>
                                                    <td bgcolor="#ffffff">{{ GetIP(long2ip($v['user_ip'])) }}</td>
                                                    <td bgcolor="#ffffff">{{ date('Y-m-d H:i:s',$v['user_time']) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-sm-6" style="float:  right;">
                                            <div class="dataTables_paginate paging_simple_numbers">
                                                <ul class="pagination">
                                                  {!! $U_dlrecords->render() !!}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
