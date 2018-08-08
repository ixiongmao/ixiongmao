@extends('Admin.common')

@section('AD2_title', '评论管理')

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
                      <th>状态</th>
                      <th>用户</th>
                      <th>商品</th>
                      <th>评论内容</th>
                      <th>添加时间</th>
                      <th>操作</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $k => $v)
                  <tr>
                      <td>{{ $v['id'] }}</td>
                      <td>
                        @if ($v['comment_status'] == 0)
                          <font color="red">隐藏</font>
                        @else
                          显示
                        @endif
                      </td>
                      <td>{{ $v->UsersInfo->u_name }}</td>
                      <td><a href="/item/{{ $v->GoodsInfo->id }}" target="_blank">{{ $v->GoodsInfo->goods_name }}</a></td>
                      <td><button type="button" class="btn btn-outline btn-default btn-sm" data-toggle="modal" data-target=".detail-{{ $v['id'] }}">点击查看详细</button></td>
                      <td>{{ date('Y-m-d H:i:s',$v['comment_time']) }}</td>
                      <td><a href="/admin/comment/del/{{ $v['id'] }}" class="btn btn-danger btn-sm">删除</a></td>
                  </tr>
                <!-- 详细加载开始 -->
                <div class="modal fade detail-{{ $v['id'] }}" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">随意点击框外面其他处，即可关闭</h4>
                      </div>
                      <div class="ixongmao_content">
                        <p style="margin:0px;padding:5px;">{!! $v['comment_content'] !!}</p>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- 详细加载结束 -->
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
