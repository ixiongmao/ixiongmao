@extends('Admin.common')

@section('AD2_title', '员工添加')

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
                        <div class="col-lg-8">
                            <form action="/admin/admin/store" method="post">
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
                                      <input type="radio" name="a_status" value="0" id="radio">冻结
                                  </label>
                                  <label class="radio-inline">
                                      <input type="radio" name="a_status" value="1" id="radio" checked>正常
                                  </label>
                              </div>
                              <div class="form-group">
                                  <label>员工权限</label>
                                  <label class="checkbox-inline">
                                      <input type="checkbox" name="a_permission[]" value="0" checked>后台首页</label>
                                  <label class="checkbox-inline">
                                      <input type="checkbox" name="a_permission[]" value="1">员工管理</label>
                                  <label class="checkbox-inline">
                                      <input type="checkbox" name="a_permission[]" value="2">网站设置</label>
                                  <label class="checkbox-inline">
                                      <input type="checkbox" name="a_permission[]" value="3">订单管理</label>
                                  <label class="checkbox-inline">
                                      <input type="checkbox" name="a_permission[]" value="4">商品管理</label>
                              </div>
                              <div class="form-group input-group">
                                  <span class="input-group-addon">用户名</span>
                                  <input class="form-control" type="text" name="a_name" placeholder="请输入用户名">
                              </div>
                              <div class="form-group input-group">
                                  <span class="input-group-addon">密码</span>
                                  <input type="text" class="form-control" name="a_password" placeholder="请输入密码" data-toggle="tooltip" data-placement="bottom" data-original-title="6~16个字符，可使用字母、数字、下划线、星号.">
                              </div>
                              <div class="form-group input-group">
                                  <span class="input-group-addon">确认密码</span>
                                  <input type="text" class="form-control" name="a_passwd" placeholder="请重复密码">
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
      isName = false;
      $('input[name=a_name').blur(function() {
        var a_name = $('input[name=a_name]').val();
              if (a_name == '') {
                layer.msg('请输入用户名');
                return false;
              }
              $.ajax({
                url:'/admin/admin/ajax',
                type:'POST',
                data:{'a_name':a_name},
                success:function(msg) {
                  if (msg == 'Success') {
                    layer.msg('可以注册!');
                    isName = true;
                  } else {
                    layer.msg('名字已存在');
                    isName = false;
                    return false;
                  }
                },
                dataType:'HTML',
                async:true
              });
      });
    $('#submit').click(function() {
      if (isName == true) {
        return true;
      }
      return false;
    });
    </script>
@endsection
