@extends('Admin.common')

@section('AD2_title', '查看订单-'.$order_id)

@section('Left_Nav')
    @parent
@endsection

@section('content')
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                  <div class="panel-heading">@yield('AD2_title')</div>
                  <div class="panel-body">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs">
                      <li class="active">
                          <a href="#home" data-toggle="tab" aria-expanded="true">收货地址</a></li>
                      <li class="">
                          <a href="#profile" data-toggle="tab" aria-expanded="false">订单详细商品列表</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                      <div class="tab-pane fade active in" id="home">
                          <h4>收货地址</h4>
                          <p>姓名：{{ $Address_show_data['address_name'] }}</br>
                            电话：{{ $Address_show_data['address_phone'] }}</br>
                            地址：{{ $Address_show_data['address_address'] }}</br>
                          </p>
                      </div>
                      <div class="tab-pane fade" id="profile">
                          <h4>订单详细商品列表</h4>
                          <table class="table table-striped table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>商品名称和套餐</th>
                                    </tr>
                              </thead>
                              <tbody>
                                @foreach ($Goods_show_data as $v)
                                  @if (in_array($v['id'],explode(',',$Orders_show_data['goods_id'])))
                                  <tr>
                                      <td><a href="/item/{{ $v['id'] }}" target="_blank" class="f6">{{ $v['goods_name'] }} &nbsp;
                                        @if (!empty($Orders_show_data['orders_meal_name']) && !empty($Orders_show_data['orders_meal_price']))
                                          |&nbsp; 套餐：{{ $Orders_show_data['orders_meal_name'] }}
                                        @endif
                                        </a>
                                      </td>

                                  </tr>
                                    @endif
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
                  <div class="panel-body">
                      <div class="table-responsive">

                      </div>
                      <!-- /.row (nested) --></div>
                  <!-- /.panel-body --></div>
              <!-- /.panel --></div>
          <!-- /.col-lg-12 --></div>
      <!-- /.row -->
@endsection
