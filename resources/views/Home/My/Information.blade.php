@extends('Home.User.Ucommon')

@section('Home_title','个人资料修改')
@section('User_content')
<script type="text/javascript">jQuery(document).ready(function($) {
        //open popup
        $(' .ck').on('click',
        function(event) {
            event.preventDefault();
            $(this).parent().find(".cd-popup").addClass('is-visible');
        });

        //close popup
        $('.cd-popup').on('click',
        function(event) {
            if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
                event.preventDefault();
                $(this).removeClass('is-visible');
            }
        });
    });</script>
<link rel="stylesheet" href="/Home/static/css/user/form.css">
<input name="m_id" type="hidden" value="{{ $get_session['id'] }}" id="m_id">
<div class="my_nala_centre ilizi_centre">
    <div class="ilizi cle">
        <div class="box">
            <div class="box_1">
                <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                    <h1>个人资料</h1>
                    <div class="user-edit">
                        <ul class="user-detail">
                            <li class="touxiang">
                                <div class="user-card">
                                    <img class="avatar" src="{{ $U_user['u_photo'] }}"></div>
                                <div class="ada-btn-area" style="top:55px">
                                    <a class="n-btn ck" id="is_img_avatar1" onclick=""></a>
                                    <a class="n-btn ck" id="is_img_avatar" onclick="">修改</a>
                                    <div class="cd-popup">
                                        <div class="cd-popup-container">
                                            <div class="cd-popuptext">
                                                <span class="cd-potitle red pl20">修改头像上传</span>
                                                <a href="#" class="cd-popup-close img-replace"></a>
                                            </div>
                                            <div class="user-form">
                                                <dl>
                                                    <dt>头像上传：</dt>
                                                    <dd>
                                                        <input name="m_photo" type="text" size="25" class="inputBg inputxt inval" placeholder="点击这里上传头像" id="picture">
                                                        <div class="Validform_checktip"></div>
                                                    </dd>
                                                </dl>
                                                <dl class="tip_btn mt-20">
                                                    <input name="submit" type="submit" class="inputxt sumbit" style="border:none;" value="确定" id="d_picture"></dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="user-curr" class="click-row">
                                <div class="font-img-item">
                                    <em class="fa-detail fa-user"></em>
                                    <p class="title-normal">基础资料</p>
                                    <p class="font-default">用于编辑基础资料编辑个人信息</p></div>
                                <div class="ada-btn-area" style="top:30px">
                                    <a class="n-btn ck" onclick="">修 改</a>
                                    <div class="cd-popup" role="alert">
                                        <div class="cd-popup-container">
                                            <div class="cd-popuptext">
                                                <span class="cd-potitle red pl20">编辑基础资料</span>
                                                <a href="#" class="cd-popup-close img-replace"></a>
                                            </div>
                                            <div class="user-form">
                                                <dl>
                                                    <dt class="sex">性别：</dt>
                                                    <dd class="radio">
                                                        <input type="radio" name="m_sex" value="0" @if ($get_session[ 'u_sex']==0 ) checked="checked" @endif>保密
                                                        <input type="radio" name="m_sex" value="1" @if ($get_session[ 'u_sex']==1 ) checked="checked" @endif>女
                                                        <input type="radio" name="m_sex" value="2" @if ($get_session[ 'u_sex']==2 ) checked="checked" @endif>男</dd></dl>
                                                <div class="clearfix"></div>
                                                <dl class="tip_btn" style="padding-top: 0px;padding-bottom: 10px">
                                                    <input class="inputxt sumbit" type="submit" value="保 存" id="Ziliao"></dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="user-passd" class="click-row">
                                <div class="font-img-item clearfix">
                                    <em class="fa-detail fa-lock"></em>
                                    <p class="title-normal">账号密码</p>
                                    <p class="font-default">用于保护账号信息和登录安全</p></div>
                                <div class="ada-btn-area" style="top:30px">
                                    <a class="n-btn ck" href="" onclick="">修 改</a>
                                    <div class="cd-popup" role="alert">
                                        <div class="cd-popup-container">
                                            <div class="cd-popuptext">
                                                <span class="cd-potitle red pl20">修改密码</span>
                                                <a href="#" class="cd-popup-close img-replace"></a>
                                            </div>
                                            <div class="user-form">
                                                    <dl>
                                                        <dt>新密码：</dt>
                                                        <dd>
                                                            <input name="m_password" type="password" size="25" class="inputxt inval" placeholder="请输入新密码" id="m_password">
                                                            <div class="Validform_checktip"></div>
                                                        </dd>
                                                    </dl>
                                                    <dl>
                                                        <dt>确认密码：</dt>
                                                        <dd>
                                                            <input name="m_passwd" type="password" size="25" class="inputxt inval" placeholder="请再输入一次新密码" id="m_passwd">
                                                            <div class="Validform_checktip"></div>
                                                        </dd>
                                                    </dl>
                                                    <dl class="tip_btn mt-20">
                                                        <input type="submit" class="inputxt sumbit" style="border:none;" value="确定" id="SetMima">
                                                    </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="binding_mobile" class="clicl-row">
                                <div class="font-img-item clearfix">
                                    <em class="fa-detail fa-phone"></em>
                                    <p class="title-normal">绑定手机号
                                        <span class="title-normal wap-desc"></span></p>
                                    <p class="font-default">绑定手机号可以用于登录雷神账号，重置密码或其他安全验证</p></div>
                                <div class="ada-btn-area" style="top:30px">
                                    <a class="n-btn ck" href="" onclick="">修 改</a>
                                    <div class="cd-popup">
                                        <div class="cd-popup-container">
                                            <div class="cd-popuptext">
                                                <span class="cd-potitle red pl20">修改手机号</span>
                                                <a href="#" class="cd-popup-close img-replace"></a>
                                            </div>
                                            <div class="user-form">
                                                <dl>
                                                    <dt>手机号：</dt>
                                                    <dd>
                                                        <input name="m_phone" type="text" size="25" class="inputBg inputxt inval" placeholder="请输入新的手机号" id="m_phone">
                                                        <div class="Validform_checktip"></div>
                                                    </dd>
                                                </dl>
                                                <dl class="tip_btn mt-20">
                                                    <input name="submit" type="submit" class="inputxt sumbit" style="border:none;" value="确定" id="Setphone"></dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- <li id="binding_mobile2" class="clicl-row">
                                <div class="font-img-item clearfix" style="height:60px;">
                                    <em class="fa-detail fa-bind"></em>
                                    <p class="title-normal">绑定帐号</p>
                                    <p class="font-default">绑定第三方账号可以用于登录雷神账号</p></div>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('input[name=m_password]').focus(function() {
    layer.tips('6~18个字符，可使用字母、数字、下划线、星号.', '#m_password');
}).blur(function() {
    var m_password = $(this).val();
    var password_prega = /[0-9]{6,16}/g;
    var password_pregb = /[A-Z]{6,16}/g;
    var password_pregc = /[0-9a-zA-Z_]{6,16}/g;
    if (password_prega.test(m_password)) {
        layer.tips('密码强度弱', '#m_password');
    } else if (password_pregb.test(m_password)) {
        layer.tips('密码强度中等', '#m_password');
    } else if (password_pregc.test(m_password)) {
        layer.tips('密码强度强', '#m_password');
    } else {
        layer.tips('密码格式不正确', '#m_password');
    }
});

  $('#d_picture').click(function() {
        var m_id = $('#m_id').val();
        var m_photo = $('input[name=m_photo]').val();
        $.ajax({
            url: '/User/My/Ajax?do=my_informationImg',
            type: 'POST',
            data: {
                'm_id': m_id,
                'm_photo': m_photo
            },
            success: function(msg) {
                if (msg == null) {
                    layer.msg(msg);
                } else {
                    layer.msg(msg);
                }
            },
            error: function(xhr) {
                layer.msg('服务器出了点小毛病,请重试!');
            },
            dataType: 'HTML',
            async: true
        });
    });

    $('#Ziliao').click(function() {
        var m_id = $('#m_id').val();
        var m_sex = $('input[type=radio]:checked').val();
        $.ajax({
            url: '/User/My/Ajax?do=my_informationZiliao',
            type: 'POST',
            data: {
                'm_id': m_id,
                'm_sex': m_sex
            },
            success: function(msg) {
                if (msg == null) {
                    layer.msg(msg);
                } else {
                    layer.msg(msg);
                }
            },
            error: function(xhr) {
                layer.msg('服务器出了点小毛病,请重试!');
            },
            dataType: 'HTML',
            async: true
        });
    });

    $('#SetMima').click(function() {
        var m_id = $('#m_id').val();
        var m_password = $('#m_password').val();
        var m_passwd = $('#m_passwd').val();

        $.ajax({
            url: '/User/My/Ajax?do=my_information',
            type: 'POST',
            data: {'m_id': m_id,'m_password': m_password,'m_passwd': m_passwd},
            success: function(msg) {
                if (msg == null) {
                    layer.msg(msg);
                } else {
                    layer.msg(msg);
                }
            },
            error: function(xhr) {
                layer.msg('服务器出了点小毛病,请重试!');
            },
            dataType: 'HTML',
            async: true
        });
    });

    $('#Setphone').click(function() {
        var m_id = $('#m_id').val();
        var m_phone = $('#m_phone').val();

        $.ajax({
            url: '/User/My/Ajax?do=my_informationPhone',
            type: 'POST',
            data: {'m_id': m_id,'m_phone': m_phone},
            success: function(msg) {
                if (msg == null) {
                    layer.msg(msg);
                } else {
                    layer.msg(msg);
                }
            },
            error: function(xhr) {
                layer.msg('服务器出了点小毛病,请重试!');
            },
            dataType: 'HTML',
            async: true
        });
    });
  </script>
@endsection
