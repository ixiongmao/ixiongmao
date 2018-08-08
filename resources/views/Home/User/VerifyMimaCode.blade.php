@extends('Home.common')

@section('Home_title', '找回密码')

@section('Left_Nav')
    @parent
@endsection

@section('content')
    <link rel="stylesheet" href="/Home/static/css/login.css">
    <div id="main" style="margin:  5px;background:#fff;">
        <div class="n-frame device-frame reg_frame">
            <div class="title-item dis_bot35 t_c">
                <h4 class="title-big">@yield('Home_title')</h4></div>
            <div class="regbox" id="register_box">
                <form action="/User/SetMima" method="post" id="isForm">
                  {{ csrf_field() }}
                    <div class="phone_step1">
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="text" name="m_name" placeholder="请输入用户名" id="m_name"></label>
                        </div>
                        <div style="margin:0px 0px 7px 0px;">
                            请选择验证方式：
                            <input type="radio" name="verify_mode" value="0" checked id="isPhone"/><span>手机号</span>
                            <input type="radio" name="verify_mode" value="1" id="isEmail"/><span>邮箱</span>
                        </div>
                        <div class="inputbg" id="isPhoneYzm">
                            <label class="labelbox" style="float:left;">
                                <input type="text" name="sms_code" id="sms_code" size="25" placeholder="请输入短信验证码" style="width:213px;"></label>
                            <label class="inputbg" style="float:left;">
                                <input type="button" id="sendCodePhone" value="获取验证码" style="width:90px;margin-left:6px;background-color:#B9000F;color:#fff;font-size:14px;height:45px;line-height:40px;border-radius:5px;"></label>
                            <span class="t_text" id="extend_field5i">手机</span>
                            <span class="error_icon"></span>
                        </div>

                        <div class="fixed_bot mar_phone_dis1">
                            <input type="submit" value="点击找回密码" class="btn332 btn_reg_1 submit-step" id="submit"></div>
                        <div class="trig">已有账号?
                            <a href="/reg" class="trigger-box">点击注册</a><span class="sep">|</span><a href="/login" class="trigger-box">点击登录</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $(function() {
            isName = false;
            isPushemail = false;
            isCode = false;
            $('#isEmail').click(function() {
                if ('#isEmail:checked') {
                    $('#isPhoneYzm').hide();
                    $('input[name=m_pushemail]').val('');
                }
            });
            $('#isPhone').click(function() {
                if ('#isPhone:checked') {
                    $('#isPhoneYzm').show();
                    $('input[name=m_pushemail]').val('');
                }
            });
            $('#sendCodePhone').click(function() {
                m_name = $('input[name=m_name]').val();
                verify_mode = $('input[name=verify_mode]:checked').val();
                sms_code = $('input[name=sms_code]').val();
                if (m_name == '') {
                    layer.msg('请输入账号');
                    isName = false;
                    return false;
                } else {
                    if (verify_mode == '0') {
                        $.ajax({
                            url: '/User/Ajax?do=VerifySendCodePhone',
                            type: 'POST',
                            data: {
                                'm_name': m_name
                            },
                            success: function(msg) {
                                if (msg.code == '2') {
                                    layer.msg('短信验证码发送成功!');
                                } else {
                                    layer.msg('发送失败!');
                                }
                            },
                            dataType: 'JSON',
                            async: true
                        });
                    }
    
                }
            });
            $('#submit').click(function() {
                verify_mode = $('input[name=verify_mode]:checked').val();
                if (verify_mode == '0') {
                    sms_code = $('input[name=sms_code]').val();
                    if (sms_code == '') {
                        layer.msg('请输入验证码!');
                        isName = false;
                        return false;
                    } else {
                        $.ajax({
                            url: '/User/Ajax?do=VerifySendCodePhoneYz',
                            type: 'POST',
                            data: {
                                'sms_code': sms_code
                            },
                            success: function(msg) {
                                if (msg == 'Success') {
                                    layer.msg('手机验证成功！');
                                    isName = true
                                } else {
                                    layer.msg('手机验证码错误！');
                                    isName = false;
                                    return false;
                                }
                            },
                            dataType: 'HTML',
                            async: true
                        });
                    }
                }
                if (verify_mode == '1') {
                    m_name = $('input[name=m_name]').val();
                    $.ajax({
                        url: '/User/Ajax?do=VerifyMimaCodeMail',
                        type: 'POST',
                        data: {
                            'm_name': m_name,
                        },
                        success: function(msg) {
                            if (msg == 'Error') {
                                layer.msg('验证失败');
                                isYanzheng = false;
                            } else {
                                if (msg == 'MailSuccess') {
                                    layer.msg('邮件发送成功，请及时验证');
                                } else {
                                    layer.msg('邮件发送失败');
                                    isYanzheng = false;
                                }
    
                            }
                        },
                        dataType: 'HTMl',
                        async: true
                    });
                    return false;
                }
    
                if (isName == true) {
                    return true;
                }
                return false;
            });
    
        });
      </script>
@endsection
