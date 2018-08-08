@extends('Admin.common')

@section('AD2_title', '套餐管理')

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
            <form action="/admin/meals/index" method="get">
                <div class="col-sm-12" style="float:  right;">
                    <div class="form-group input-group">
                      <label>请输入关键字</label>
                        <input type="text" name="fk_guanjianzi" class="form-control" style="border-radius: 5px 0px 0px 5px;">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit" style="margin-top: 25px;"><i class="fa fa-search" title="点击搜索"></i></button></span>
                    </div>
                </div>
            </form>
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
                      <th>组合套餐商品名</th>
                      <th>套餐说明</th>
                      <th>组合商品价格</th>
                      <th>操作</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($meal as $k=>$v )
                <tr>
                    <td>{{ $v['id']}}</td>
                    <td>{{ $v['goods_meals_name']}}</td>
                    <td>{{ $v['goods_meals_detail']}}</td>
                    <td>{{ $v['goods_meals_price']}}</td>
                    <td>
                        <a href="/admin/meals/edit/{{ $v['id'] }}" class="btn btn-primary">修改</a>
                        <a href="/admin/meals/delete/{{ $v['id'] }}" class="btn btn-danger" onclick="return confirm('此操作将影响其他模块，请谨慎操作！')">删除</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-sm-6">
              <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                  <ul class="pagination">
                    {!! $meal->render() !!}
                  </ul>
              </div>
          </div>
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
  </div>
@endsection
