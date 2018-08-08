@extends('Admin.common')

@section('AD2_title', '广告管理')

@section('Left_Nav')
    @parent
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">@yield('AD2_title')</div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            @if (session('Success'))
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              {{ session('Success') }}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>广告状态</th>
                      <th>广告名字</th>
                      <th>广告备注</th>
                      <th>广告图片</th>
                      <th>广告地址</th>
                      <th>到期时间</th>
                      <th>添加时间</th>
                      <th>操作</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $k => $v)
                  <tr>
                      <td>{{ $v['id'] }}</td>
                      <td>
                        @if ($v['ad_status'] == 0)
                          <font color="red">隐藏</font>
                        @else
                          显示
                        @endif
                      </td>
                      <td>{{ $v['ad_name'] }}</td>
                      <td>{{ $v['ad_remark'] }}</td>
                      <td><button type="button" class="btn btn-outline btn-default btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-{{ $v['id'] }}">点击查看图片大图</button></td>
                      <td>{{ $v['ad_url'] }}</td>
                      <td>{{ date('Y-m-d H:i:s',$v['ad_etime']) }}</td>
                      <td>{{ date('Y-m-d H:i:s',$v['ad_time']) }}</td>
                      <td><a href="/admin/ad/edit/{{ $v['id'] }}" class="btn btn-primary btn-sm">修改</a></td>
                  </tr>
                  <!-- 图片放大加载开始 -->
                  <div class="modal fade bs-example-modal-lg-{{ $v['id'] }}" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">随意点击框外面其他处，即可关闭</h4>
                        </div>
                        <img src="{{ $v['ad_pic'] }}" width="100%" style="margin:0px">
                      </div>
                    </div>
                  </div>
                <!-- 图片放大加载结束 -->
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
  </div>
@endsection
