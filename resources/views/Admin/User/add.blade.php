@extends('Admin.common')

@section('AD2_title', '用户添加')

@section('Left_Nav')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">@yield('AD2_title')</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="/admin/user/store" method="post" id="isForm">
                              {{ csrf_field() }}
                              @if (session('Error'))
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('Error') }}
                              </div>
                              @endif
                                <div class="form-group">
                                    <label>状态</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="u_status" value="0" id="radio">冻结
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="u_status" value="1" id="radio" checked>正常
                                    </label>
                                </div>
                              <div class="form-group">
                                  <label>邮箱验证状态</label>
                                  <label class="radio-inline">
                                      <input type="radio" name="u_mail_status" value="0" id="radio">未验证
                                  </label>
                                  <label class="radio-inline">
                                      <input type="radio" name="u_mail_status" value="1" id="radio" checked>已验证
                                  </label>
                              </div>                              
                                <div class="form-group">
                                    <label>性别</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="u_sex" value="0" id="radio" checked>保密
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="u_sex" value="1" id="radio">女
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="u_sex" value="2" id="radio">男
                                    </label>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">用户名</span>
                                    <input type="text" class="form-control" name="u_name" placeholder="请输入用户名">
                                    <span class="input-group-addon" id="u_name"></span>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">密码</span>
                                    <input type="text" class="form-control" name="u_password" placeholder="请输入密码">
                                    <span class="input-group-addon" id="u_password"></span>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">确认密码</span>
                                    <input type="text" class="form-control" name="u_passwd" placeholder="请重复密码">
                                    <span class="input-group-addon" id="u_passwd"></span>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">头像</span>
                                    <input type="text" name="u_photo" id="picture" class="form-control" />
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">邮箱</span>
                                    <input type="text" class="form-control" name="u_email" placeholder="请输入用户邮箱">
                                    <span class="input-group-addon" id="u_email"></span>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">手机号</span>
                                    <input type="text" class="form-control" name="u_phone" placeholder="请输入用户手机号">
                                    <span class="input-group-addon" id="u_phone"></span>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">余额</span>
                                    <input type="text" class="form-control" name="u_money" placeholder="请输入用户余额">
                                </div>
                                <input type="submit" class="btn btn-primary" value="提交" id="submit">
                                <input type="reset" class="btn btn-default" value="重置">
                              </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                      </div>
                    <!-- /.row (nested) -->
                  </div>
                <!-- /.panel-body -->
              </div>
            <!-- /.panel -->
          </div>
        <!-- /.col-lg-12 -->
      </div>
    <!-- /.row -->
    <script type="text/javascript">
        //检测用户名是否存在
        isName = false;
        isPass = false;
        isEmail = false;
        isPhone = false;
        isPassword = false;
        $('input[name=u_name]').focus(function() {
          $('#u_name').html('<font style="color:red">6~18个字符，可使用字母、数字、下划线，需以字母开头.</font>');
        }).blur(function() {
            var u_name = $('input[name=u_name]').val();
            var user_preg = /^[a-zA-Z]+[0-9_]{3,18}$/;
            if (user_preg.test(u_name)) {
                $.ajax({
                  url:'/admin/user/ajax',
                  data:{'u_name':u_name},
                  type:'POST',
                  success:function(msg) {
                    if (msg == 'Success') {
                      $('#u_name').html('<font style="color:#06c1ae">用户名可用</font>');
                      isName = true;
                    } else {
                      isName = false;
                      $('#u_name').html('<font style="color:red">用户名不可用</font>');
                    }
                  },
                  dataType:'HTML',
                  async:true
                });
            } else {
                isName = false;
                $('#u_name').html('<font style="color:red">用户名格式不正确</font>');
            }
        });

        //测试密码强度
        $('input[name=u_password]').focus(function() {
            $('#u_password').html('<font style="color:red">字母/数字/下划线/星号，不能以数字开头，用户名长度在6到16之间</font>');
        }).blur(function() {

            var password = $('input[name=u_password]').val();
            var password_prega = /[0-9]{6,16}/g;
            var password_pregb = /[a-z]{6,16}/g;
            var password_pregc = /[a-z|A-z|0-9_*]{6,16}/g;
            if (password_prega.test(password)) {
              isPassword = true;
                $('#u_password').html('<font style="color:#eea236">密码强度:弱</font>');
            } else if (password_pregb.test(password)) {
              isPassword = true;
                $('#u_password').html('<font style="color:#31b0d5">密码强度:中等</font>');
            } else if (password_pregc.test(password)) {
              isPassword = true;
                $('#u_password').html('<font style="color:#06c1ae">密码强度:强</font>');
            } else {
              isPassword = false;
                $('#u_password').html('<font style="color:red">密码格式不正确</font>');
            }
        });

        //验证密码
        $('input[name=u_passwd]').focus(function() {
            $('#u_passwd').html('<font style="color:red">请再次输入密码</font>');
        }).blur(function() {
            var password = $('input[name=u_password]').val();
            var npassword = $('input[name=u_passwd]').val();
            if (password = npassword) {
                isPass = true;
                $('#u_passwd').html('<font style="color:red"></font>');
            } else {
                $('#u_passwd').html('<font style="color:red">两次输入的密码不一致</font>');

            }
        });

        $('input[name=u_email]').focus(function() {
            $('#u_email').html('<font style="color:red">请输入邮箱</font>');
        }).blur(function() {
            var email = $('input[name=u_email]').val();
            var email_preg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
            if (email_preg.test(email)) {
                isEmail = true;
                $('#u_email').html('<font style="color:#06c1ae">邮箱格式正确</font>');
            } else {
                $('#u_email').html('<font style="color:red">邮箱格式不正确</font>');
            }
        });

        $('input[name=u_phone]').focus(function() {
            $('#u_phone').html('<font style="color:red">请输入手机号</font>');
        }).blur(function() {
            var phone = $('input[name=u_phone]').val();
            var phone_preg = /^1[345678]\d{9}$/;
            if (phone_preg.test(phone)) {
                isPhone = true;
                $('#u_phone').html('<font style="color:#06c1ae">手机号格式正确</font>');
            } else {
                $('#u_phone').html('<font style="color:red">手机号不格式正确</font>');
            }
        });



        $('#isForm').submit(function() {
            if (isName && isPass && isPassword && isEmail && isPhone) {
                return true;
            }
            return false;
        });
      </script>
@endsection
