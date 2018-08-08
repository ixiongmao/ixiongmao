<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>后台登录</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Admin/assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Admin/assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Admin/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      /* body{
        background: rgb(20,20,20);

      } */
    </style>
</head>

<body>
  <img src="" alt="">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align:  center;">后台登录</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/admin/login/select" method="post">
                          {{ csrf_field() }}
                            <fieldset>
                              @if (session('Error'))
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{session('Error')}}
                              </div>
                              @endif
                                <div class="form-group">
                                    <input class="form-control" placeholder="请输入用户名" name="a_name" type="text" id="a_name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="请输入密码" name="a_password" type="password" id="a_password">
                                </div>
                                <input type="submit" name="" value="点击登录" class="btn btn-lg btn-primary btn-block" id="submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/Admin/assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/Admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/Admin/assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/Admin/assets/dist/js/sb-admin-2.js"></script>
    <script src="/Home/layui/layui/layui.all.js"></script>
    <script type="text/javascript">
      $(function() {
        //var isName, isPasswd = false;
        $('#submit').click(function() {
        var a_name = $('#a_name').val();
        var a_passwd = $('#a_password').val();
        //如果a_name 内容为空 则执行下面
          if (a_name == '' || a_passwd == '') {
            layer.msg('请确保用户名和密码不能为空');
            return false;
          }
        });
      });
    </script>

</body>

</html>
