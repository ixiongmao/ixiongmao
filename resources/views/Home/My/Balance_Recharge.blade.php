@extends('Home.User.Ucommon')

@section('Home_title','余额充值')
@section('User_content')
      <div class="my_nala_centre ilizi_centre">
          <div class="ilizi cle">
              <div class="box">
                  <div class="box_1">
                      <div class="userCenterBox boxCenterList clearfix" style="_height:1%; font-size:14px;">
                          <h1>@yield('Home_title')</h1>
                          <div class="layui-tab" lay-filter="test">
                              <ul class="layui-tab-title">
                                  <li class="layui-this">充值卡充值</li>
                                 <!--  <li>二维码转账</li> -->
                              </ul>
                              <!-- layui-tab-content 开始 -->
                              <div class="layui-tab-content">
                        	    <form>
                                  <div class="layui-tab-item layui-show">
                                      <div class="layui-form-item">
                                          <label class="layui-form-label">卡号：</label>
                                          <div class="layui-input-block">
                                              <input type="text" name="Recharge_kahao" placeholder="请输入卡号" class="layui-input" style="border-radius: 5px;"></div>
                                      </div>
                                      <div class="layui-form-item">
                                          <label class="layui-form-label">卡密：</label>
                                          <div class="layui-input-block">
                                              <input type="text" name="Recharge_mima" placeholder="请输入卡密" class="layui-input" style="border-radius: 5px;"></div>
                                      </div>
                                      <div class="layui-form-item">
                                          <div class="layui-input-block">
                                              <button class="layui-btn" style="background-color: #B9000F;" id="submit">立即充值</button>
                                        </div>
                                      </div>
                                  </div>                         
                                </form>
                                 <!--  <div class="layui-tab-item">内容2</div> -->
                              </div>
                              <!-- layui-tab-content 结束 -->

                            </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <script type="text/javascript">
      $(function() {
              $('#submit').click(function() {
                  Recharge_kahao = $('input[name=Recharge_kahao]').val();
                  Recharge_mima = $('input[name=Recharge_mima]').val();
                  if (Recharge_kahao == '') {
                      layer.msg('请输入充值卡号！');
                      return;
                  } else if (Recharge_mima == '') {
                      layer.msg('请输入充值密码！');
                      return;
                  }
                  $.ajax({
                      url: '/User/Balance_Recharge/Ajax?do=Balance_Recharge',
                      type: 'POST',
                      data: {
                          'Recharge_kahao': Recharge_kahao,
                          'Recharge_mima': Recharge_mima
                      },
                      success: function(msg) {
                          if (msg == 'Empty_Error') {
                              layer.msg('请输入充值卡号和密码！');
                              return;
                          } else {
                              if (msg == 'JinETaiDaNot') {
                                  layer.msg('您的金额太大，无法充值，请联系客服！');
                                  return;
                              } else {
                                  if (msg == 'NotFound') {
                                      layer.msg('服务器出了点小毛病,请重试!');
                                  } else {
                                      if (msg == 'Kami_NotFound') {
                                          layer.msg('余额充值卡密信息没有找到！');
                                      } else {
                                          if (msg == 'Success') {
                                              layer.msg('充值成功！');
                                          } else {
                                              layer.msg('充值失败，请联系客服！');
                                          }
                                      }
                                  }
                              }
                          }
                      },
                      dataType: 'HTML',
                      error: function() {
                          layer.msg('服务器出了点小毛病,请重试！');
                      }
                  });
              });
          });
        </script>
@endsection
