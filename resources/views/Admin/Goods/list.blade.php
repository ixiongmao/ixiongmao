@extends('Admin.common')

@section('AD2_title', '商品列表管理')

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
            <div class="form-group input-group col-lg-6" style="width:900px;">
            <form action="/admin/goods/index" mothod="get">
                      <table><tr><td>按分类搜索：</td><td>
                          <select class="form-control" style="width:200px;" name="id">
                              <option value="0">--请选择--</option>
                               @foreach($cate as $k=>$v)
                               @if(substr_count($v->path,',')==0)
                              <option value="{{ $v->id }}">{{ $v->cname }}</option>
                               @endif
                               @endforeach
                          </select>
                          <span class="input-group-btn">
                              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                              </button>
                          </span>
                      </td>
                      <!-- <td ><span style="float:right;margin-left:150px;">按名称搜索：</span></span></td><td>
                          <div style="float:right;">
                          <input type="text" name="fk_guanjianzi" class="form-control input-group" style="width:200px;">
                          <span class="input-group-btn">
                              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                              </button>
                          </span>
                          </div> 
                      </td></tr> -->
                    </table>              
            </form>
          </div>
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
                      <th>名称</th>
                      <th>名称</th>
                      <th>编号</th>
                      <th>类别</th>
                      <th>图片</th>
                      <th>价格</th>
                      <th>是否促销</th>
                      <th>促销价格</th>
                      <th>开始时间</th>
                      <th>结束时间</th>
                      <th>是否上架</th>
                      <th>库存</th>
                      <th>套餐</th>
                      <th>操作人</th>
                      <th>添加时间</th>
                      <th>操作</th>
                  </tr>
              </thead>
              <tbody>
                <form action="/admin/goods/delAll" method="post">
                 {{  csrf_field() }}
                @foreach($data as $k => $v)
                  <tr>
                      <td class="sorting_1">
                          <input type="checkbox" class="ck checkbox-inline" name="item[]" value="{{ $v['id'] }}">
                      </td>
                      <td>{{ $v['id'] }}</td>
                      <td>{{ $v['goods_name'] }}</td>
                      <td>{{ $v['goods_sn'] }}</td>
                      @foreach($cate as $ka=>$va)
                      @if($v['goods_cates'] == $va['id'])
                      <td>{{ $va['cname'] }}</td>
                      @endif
                      @endforeach
                      <td><img style="width:50px;" src="{{ $v['goods_pic'] }}"></td>
                      <td>{{ $v['goods_price'] }}</td>
                      @if($v['goods_sales_status']==1)
                      <td><code>√</code></td>
                      <td>{{ $v['goods_sales_price'] }}</td>
                      <td>{{ date('Y-m-d h:i:s',$v['goods_sales_start']) }}</td>
                      <td>{{ date('Y-m-d h:i:s',$v['goods_sales_end']) }}</td>
                      @else
                      <td>×</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      @endif
                      <td>{{ $v['goods_status'] }}</td>
                      @foreach($detail as $ka => $va)
                      @if($v['id']==$va['gid'])
                      <td>{{ $va['goods_nums'] }}</td>
                      <td>{{ $va['goods_set_meals'] }}</td>
                      @endif
                      @endforeach
                      <td>{{ $v['handler'] }}</td>
                      <td >{{ $v['hander_time'] }}</td>
                      <td><a href="/admin/goods/edit/{{ $v['id'] }}" class="btn btn-primary btn-sm">修改</a> | <a href="/admin/goods/destroy/{{ $v['id'] }}" class="btn btn-danger btn-sm">删除</a></td>
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div>
               <input type="submit" class="btn btn-danger" value="批量删除">
            </form>
               <button class="btn btn-default" id="xuan">全选</button>
     		   <button class="btn btn-default" id="bu">全不选</button>
    		   <button class="btn btn-default" id="fan">反选</button>
          </div>
          <div class="col-sm-6">
              <div class="dataTables_paginate paging_simple_numbers text-center" id="dataTables-example_paginate">
                  <ul class="pagination">
                     @if($id)
                    {!! $data->appends(['id' => $id])->render() !!}
                    @else
                    {!! $data->render() !!}
                    @endif
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
<script type="text/javascript">
    $('#xuan').click(function(){
        $('input[type=checkbox]').attr('checked',true);
    })

    $('#bu').click(function(){
         $('input[type=checkbox]').removeAttr('checked');
    })
    $('#fan').click(function(){
        var a = $('input[type=checkbox]:checked');
        $('input[type=checkbox]').attr('checked',true);
        a.attr('checked',false);
    })
</script>
@endsection
