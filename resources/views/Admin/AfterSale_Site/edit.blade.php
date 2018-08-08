@extends('Admin.common')

@section('AD2_title', '网点修改')

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
                  <form action="/admin/aftersale_site/update/{{ $data['id'] }}" method="post">
                    {{ csrf_field() }}
                    @if (session('Error'))
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      {{ session('Error') }}
                    </div>
                    @endif
                      <div class="form-group input-group">
                          <span class="input-group-addon">网点地址</span>
                          <input type="text" class="form-control" name="aftersale_site" value="{{ $data['aftersale_site'] }}" placeholder="请输入网点地址">
                      </div>
                      <div class="form-group input-group">
                          <span class="input-group-addon">联系电话</span>
                          <input type="text" class="form-control" name="aftersale_phone" value="{{ $data['aftersale_phone'] }}" placeholder="请输入售后范围"/></div>
                      <div class="form-group input-group">
                          <span class="input-group-addon">售后范围</span>
                          <input type="text" class="form-control" name="aftersale_scope" value="{{ $data['aftersale_scope'] }}" placeholder="请输入售后范围"></div>

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
@endsection
