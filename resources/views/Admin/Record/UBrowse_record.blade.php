@extends('Admin.common')

@section('AD2_title', '用户登录记录查看')

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
                                  <th>ID</th>
                                  <th>商品</th>
                                  <th>时间</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $k => $v)
                                  @foreach ($Goods_data as $vv)
                                    @if ($v['gid'] == $vv['id'])
                                  <tr>
                                      <td>{{ $v['id'] }}</td>
                                      <td>{{ $vv['goods_name']}}</td>
                                      <td>{{ date('Y-m-d H:i:s',$v['time']) }}</td>
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
                              {!! $data->appends(['Record'=>'browse'])->render() !!}
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
