@extends('Home.common')

@section('Home_title', '注册账号')

@section('Left_Nav')
    @parent
@endsection

@section('content')
<link rel="stylesheet" href="/Home/static/css/login.css">
    <div id="main" style="margin:  5px;background:#fff;">
        <div class="n-frame device-frame reg_frame">
            <div class="title-item dis_bot35 t_c">
                <h4 class="title-big">注册官网帐号</h4></div>
            <div class="regbox" id="register_box">
                <form action="/reg/create" method="post">
                  {{ csrf_field() }}
                    <div class="phone_step1">
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="text" name="m_name" placeholder="用户名" id="m_name"></label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input name="m_email" type="text" placeholder="邮箱" id="m_email"></label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="password" name="m_password" placeholder="密码" id="m_password"></label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input name="m_passwd" type="password" placeholder="确认密码" id="m_passwd"></label>
                        </div>
                        <div style="margin:0px 0px 7px 0px;">
                            性别：
                            <input type="radio" name="m_sex" value="0" checked /><span>保密</span>
                            <input type="radio" name="m_sex" value="1" /><span>女</span>
                            <input type="radio" name="m_sex" value="2" /><span>男</span>
                        </div>

                        <div class="inputbg">
                            <label class="labelbox">
                                <input name="m_phone" type="text" placeholder="手机号" id="m_phone"></label>
                        </div>
                        <div class="inputbg">
                    <label class="labelbox" style="float:left;">
                      <input name="verify_code" type="text" size="25" placeholder="请输入右侧验证码" style="width:213px;" required="">
                    </label>
                    <label class="inputbg" style="float:left;">
                      <img src="/VerifyCode" alt="" style="width:90px;margin-left:6px;color:#fff;font-size:14px;height:45px;line-height:40px;" onclick="this.src='/VerifyCode?VerifyCode='+Math.random()">
                    </label>
                  </div>
                        <div class="fixed_bot mar_phone_dis1">
                            <input type="submit" value="注册" class="btn332 btn_reg_1 submit-step" id="submit"></div>
                        <div class="trig">已有账号?
                            <a href="/login" class="trigger-box">点击登录</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    isName = false;
    isPassword = false;
    isnu_Password = false;
    isEmail = false;
    isPhone = false;
    //验证用户名是否可用
    $('input[name=m_name]').focus(function() {
        layer.tips('6~18个字符，可使用字母、数字、下划线，需以字母开头.', '#m_name');
    }).blur(function() {
        var m_name = $(this).val();
        var m_name_preg = /^[a-zA-Z]+[0-9_]{3,18}$/;
        if (m_name_preg.test(m_name)) {
            $.ajax({
              url:'/admin/user/ajax',
              type:'POST',
              data:{'u_name': m_name},
              success:function(msg){
                if (msg == 'Error') {
                    layer.msg('用户名已存在');
                    isName = false;
                } else {
                    isName = true;
                    layer.msg('用户名可用');
                }
              },
              dataType:'HTML',
              async:true
            });
        } else {
            layer.tips('用户名格式不正确', '#m_name');
        }

    });

    $('input[name=m_password]').focus(function() {
        layer.tips('6~18个字符，可使用字母、数字、下划线、星号.', '#m_password');
    }).blur(function() {
        var m_password = $(this).val();
        var password_prega = /[0-9]{6,16}/g;
        var password_pregb = /[A-Z]{6,16}/g;
        var password_pregc = /[0-9a-zA-Z_]{6,16}/g;
        if (password_prega.test(m_password)) {
            isPassword = true;
            layer.tips('密码强度弱', '#m_password');
        } else if (password_pregb.test(m_password)) {
            isPassword = true;
            layer.tips('密码强度中等', '#m_password');
        } else if (password_pregc.test(m_password)) {
            isPassword = true;
            layer.tips('密码强度强', '#m_password');
        } else {
            layer.tips('密码格式不正确', '#m_password');
        }
    });

    $('input[name=m_passwd]').focus(function() {
          layer.tips('请再次输入密码', '#m_passwd');
    }).blur(function() {
        var password = $('input[name=m_password]').val();
        var un_password = $(this).val();
        if (un_password != password) {
          isnu_Password = false;
          layer.tips('两次输入的密码不一致', '#m_passwd');
        } else {
          isnu_Password = true;
        }
    });

    $('input[name=m_email]').focus(function() {
      layer.tips('请输入邮箱', '#m_email', {
  tipsMore: true
});
    }).blur(function() {
        var u_email = $(this).val();
        var u_email_preg = /\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/;
        if (u_email_preg.test(u_email)) {
            isEmail = true;
        } else {
            layer.tips('邮箱格式不正确', '#m_email', {
  tipsMore: true
});
            isEmail = false;
        }
    });

    $('input[name=m_phone]').focus(function() {
        layer.tips('请输入手机号码。', '#m_phone');
    }).blur(function() {
        var m_phone = $(this).val();
        var m_phone_preg = /^1[345678]\d{9}$/;
        if (m_phone_preg.test(m_phone)) {
            $.ajax({
              url:'/User/Ajax?do=isPhone',
              type:'POST',
              data:{'m_phone': m_phone},
              success:function(msg){
                if (msg == 'Error') {
                    layer.msg('手机号已存在');
                    isPhone = false;
                } else {
                    layer.msg('手机号可用');
                    isPhone = true;
                }
              },
              dataType:'HTML',
              async:true
            });
        } else {
            layer.tips('手机号格式不正确', '#m_phone');
            isPhone = false;
        }
    });

    $('#submit').click(function() {
        if (isName && isPassword && isnu_Password && isEmail && isPhone) {
            return true;
        }
        return false;
    });
  </script>
@endsection
