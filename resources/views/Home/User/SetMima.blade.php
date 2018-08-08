@extends('Home.common')

@section('Home_title', '设置新密码')

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
                <form action="/User/SavePassword" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="m_id" value="{{ $data['id'] }}">
                    <div class="phone_step1">
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="text" name="m_name" value="{{ $data['u_name'] }}" disabled></label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="password" name="m_password" placeholder="请输入密码" id="m_password"></label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="password" name="m_passwd" placeholder="请确认密码" id="m_passwd"></label>
                        </div>
                        <div class="fixed_bot mar_phone_dis1">
                            <input type="submit" value="提交" class="btn332 btn_reg_1 submit-step" id="submit"></div>
                        <div class="trig">已有账号?
                            <a href="/reg" class="trigger-box">点击注册</a><span class="sep">|</span><a href="/mima" class="trigger-box">忘记密码？</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        isPassword = false;
        isnu_Password = false;
        $('input[name=m_password]').focus(function() {
            layer.tips('6~18个字符，可使用字母、数字、下划线、星号.', '#m_password');
        }).blur(function() {
            var m_password = $(this).val();
            var password_prega = /[0-9]{6,16}/g;
            var password_pregb = /[A-Z]{6,16}/g;
            var password_pregc = /[0-9a-zA-Z_]{6,16}/g;
            if (password_prega.test(m_password)) {
                layer.tips('密码强度弱', '#m_password');
                isPassword = true;
            } else if (password_pregb.test(m_password)) {
                layer.tips('密码强度中等', '#m_password');
                isPassword = true;
            } else if (password_pregc.test(m_password)) {
                layer.tips('密码强度强', '#m_password');
                isPassword = true;
            } else {
                layer.tips('密码格式不正确', '#m_password');
                isPassword = false;
            }
        });

        $('input[name=m_passwd]').focus(function() {
            layer.tips('请再次输入密码', '#m_passwd');
        }).blur(function() {
            var password = $('input[name=m_password]').val();
            var un_password = $(this).val();
            if (un_password != password) {
                layer.tips('两次输入的密码不一致', '#m_passwd');
                isnu_Password = false;
            } else {
                isnu_Password = true;
            }
        });

        $('#submit').click(function() {
            if (isPassword && isnu_Password) {
                return true;
            }
            return false;
        });
    </script>
@endsection
