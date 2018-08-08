@extends('Admin.common')

@section('AD2_title', '积分商品兑换管理')

@section('Left_Nav')
    @parent
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <form action="/admin/scoreorder" method="get">
            <div id="dataTables-example_filter" class="dataTables_filter"><label><input type="text" name="uname" class="form-control input-sm" placeholder="用户名" aria-controls="dataTables-example"></label>
            <label><input type="text" name="order" class="form-control input-sm" placeholder="订单编号" aria-controls="dataTables-example"></label>&nbsp;<input type="submit" value="搜索" class="btn btn-primary"></div>
          </form>
        </div>
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
            @if (session('Error'))
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              {{ session('Error') }}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover text-center">
              <thead>
                  <tr>
                      <th style="text-align: center;">批量</th>
                      <th style="text-align: center;">ID</th>
                      <th style="text-align: center;">用户名</th>
                      <th style="text-align: center;">积分商品</th>
                      <th style="text-align: center;">所需积分</th>
                      <th style="text-align: center;">订单编号</th>
                      <th style="text-align: center;">订单状态</th>
                      <th style="text-align: center;">下单时间</th>
                      <th style="text-align: center;">处理时间</th>
                      <th style="text-align: center;">完成时间</th>
                      <th style="text-align: center;">操作人</th>
                      <th style="text-align: center;">操作</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $k => $v)
                  <tr> 
                      <td><input type="checkbox" name="che[]"></td>
                      <td>{{ $v['id'] }}</td>
                      @foreach($user as $ka=>$va)
                      @if($v['uid']==$va['id'])
                      <td>{{ $va['u_name'] }}</td>
                      @endif
                      @endforeach 

                      @foreach($s_goods as $key=>$val)
                      @if($v['sgid']==$val['id'])
                      <td>{{ $val['goods_scores_name'] }}</td>
                      <td>{{ $val['goods_scores_need'] }}</td>
                      @endif
                      @endforeach

                      <td>{{ $v['order_sn'] }}</td>

                      @if($v['order_status']==0)
                      <td><button class="btn btn-default"></button></td>
                      <td>{{ date('Y-m-d H:i:s',$v['order_time']) }}</td>
                      <td></td>
                      <td></td>
                      @elseif($v['order_status']==1)
                      <td><button class="btn btn-primary"></button></td>
                      <td>{{ date('Y-m-d H:i:s',$v['order_time']) }}</td>
                      <td>{{ date('Y-m-d H:i:s',$v['send_time']) }}</td>
                      <td></td>
                      @else
                      <td><button class="btn btn-success"></td>
                      <td>{{ date('Y-m-d H:i:s',$v['order_time']) }}</td>
                      <td>{{ date('Y-m-d H:i:s',$v['send_time']) }}</td>
                      <td>{{ date('Y-m-d H:i:s',$v['get_time']) }}</td>
                      @endif
                      <td>{{ $v['handler'] }}</td>
                       @if($v['order_status']==0)
                      <td><a href="/admin/scoreorder/edit/{{ $v['id'] }}" class="btn btn-primary btn-sm">发货</a> | <a href="" class="btn btn-success btn-sm">完成</a> | <a href="" class="btn btn-danger btn-sm" onclick="return confirm('你确定要取消订单吗？(不可恢复)')">取消</a></td>
                       @elseif($v['order_status']==1)
                       <td><a href="" class="btn btn-primary btn-sm">发货</a> | <a href="/admin/scoreorder/success/{{ $v['id'] }}" class="btn btn-success btn-sm">完成</a> | <a href="" class="btn btn-danger btn-sm" onclick="return confirm('你确定要取消订单吗？(不可恢复)')">取消</a></td>
                       @else
                       <td><a href="" class="btn btn-primary btn-sm">发货</a> | <a href="" class="btn btn-success btn-sm">完成</a> | <a href="" class="btn btn-danger btn-sm" onclick="return confirm('你确定要取消订单吗？(不可恢复)')">取消</a></td>
                       @endif
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                              {!! $data -> render() !!}
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
