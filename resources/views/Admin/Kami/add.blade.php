@extends('Admin.common')

@section('AD2_title', '余额充值卡密添加')

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
                            <form action="/admin/kami/store" method="post">
                              {{ csrf_field() }}
                              @if (session('Error'))
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('Error') }}
                              </div>
                              @endif
                                <div class="form-group input-group">
                                    <span class="input-group-addon">生成面额</span>
                                    <input class="form-control" type="text" name="kami_denomination" placeholder="请输入生成面额">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">生成数量</span>
                                    <input type="text" class="form-control" name="kami_number" placeholder="请输入数量">
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
@endsection
