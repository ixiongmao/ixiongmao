@extends('Admin.common')

@section('AD2_title', '用户修改')

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
                <div class="col-lg-6">
                  <form action="/admin/user/update/{{ $data -> id}}" method="post">
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
                              <input type="radio" name="u_status" value="0" id="radio" @if ($data['u_status'] == 0)
                                checked
                              @endif >冻结
                          </label>
                          <label class="radio-inline">
                              <input type="radio" name="u_status" value="1" id="radio" @if ($data['u_status'] == 1)
                                checked
                              @endif >正常
                          </label>
                      </div>
                       <div class="form-group">
                          <label>邮箱验证状态</label>
                          <label class="radio-inline">
                              <input type="radio" name="u_mail_status" value="0" id="radio" @if ($data['u_mail_status'] == 0)
                                checked
                              @endif >未验证
                          </label>
                          <label class="radio-inline">
                              <input type="radio" name="u_mail_status" value="1" id="radio" @if ($data['u_mail_status'] == 1)
                                checked
                              @endif >已验证
                          </label>
                      </div>
                      <div class="form-group input-group">
                          <span class="input-group-addon">用户名</span>
                          <input class="form-control" type="text" placeholder="Disabled input" value="{{ $data -> u_name}}" disabled="">
                      </div>
                      <div class="form-group input-group">
                          <span class="input-group-addon">余额</span>
                          <input type="text" class="form-control" name="u_money" value="{{ $data['u_money'] }}" placeholder="请输入用户余额">
                      </div>
                      <input type="submit" class="btn btn-primary" value="提交">
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
@endsection
