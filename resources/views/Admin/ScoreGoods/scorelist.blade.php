@extends('Admin.common')

@section('AD2_title', '积分商品列表')

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
          <div class="row">
             
          </div>
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
                      <th>积分商品名称</th>
                      <th>所需积分</th>
                      <th>图片</th>
                      <th>原价</th>
                      <th>库存</th>
                      <th>描述</th>
                      <th>操作人</th>
                      <th>添加时间</th>
                      <th>操作</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $k => $v)
                  <tr> 
                      <td>{{ $v['id'] }}</td>
                      <td>{{ $v['goods_scores_name'] }}</td>
                      <td>{{ $v['goods_scores_need'] }}</td>
                      <td><img style="width: 50px;" src="{{ $v['goods_scores_pic'] }}"></td>
                      <td>{{ $v['goods_scores_price'] }}</td>
                      <td>{{ $v['goods_scores_num'] }}</td>
                      <td>{{ $v['goods_scores_discript'] }}</td>
                      <td>{{ $v['goods_handler'] }}</td>
                      <td>{{ $v['goods_uptime'] }}</td>
                      <td><a href="/admin/scoregoods/edit/{{ $v['id'] }}" class="btn btn-primary btn-sm">修改</a> | <a href="/admin/scoregoods/destroy/{{ $v['id'] }}" class="btn btn-danger btn-sm">删除</a></td>
                  </tr>
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
