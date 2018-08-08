@extends('Admin.common')

@section('AD2_title', '用户收藏商品查看')

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
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                  <th>商品名称</th>
                                  <th>商品价格</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $v)
                                  @foreach ($Goods_data as $vv)
                                    @if ($v['gid'] == $vv['id'])
                                  <tr>
                                      <td><a href="/item/{{ $vv['id'] }}" target="_blank">{{ $vv['goods_name'] }}</a></td>
                                      <td>{{ $vv['goods_price'] }}</td>
                                    </tr>
                                    @endif
                                  @endforeach
                                @endforeach
                              </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                              {!! $data -> appends(['Record'=>'collect'])-> render() !!}
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
