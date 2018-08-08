@extends('Admin.common')

@section('AD2_title', '员工记录查看')

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
                                  <th>备注</th>
                                  <th>IP</th>
                                  <th>时间</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $k => $v)
                                  <tr>
                                      <td>{{ $v->id }}</td>
                                      <td>{{ $v->admin_remark }}</td>
                                      <td>{{ long2ip($v->admin_ip) }}</td>
                                      <td>{{ date('Y-m-d H:i:s',$v->admin_time) }}</td>
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
