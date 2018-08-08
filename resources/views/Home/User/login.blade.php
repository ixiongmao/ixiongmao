@extends('Home.common')

@section('Home_title', '登录账号')

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
                <form action="/login/select" method="post">
                  {{ csrf_field() }}
                    <div class="phone_step1">
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="text" name="m_name" placeholder="请输入用户名"></label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="password" name="m_password" placeholder="请输入密码"></label>
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
                            <input type="submit" value="登录" class="btn332 btn_reg_1 submit-step"></div>
                        <div class="trig">未有账号?
                            <a href="/reg" class="trigger-box">点击注册</a><span class="sep">|</span><a href="/User/VerifyMimaCode" class="trigger-box">忘记密码？</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
