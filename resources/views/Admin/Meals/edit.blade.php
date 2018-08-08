@extends('Admin.common')

@section('AD2_title', '套餐修改')

@section('Left_Nav')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">@yield('AD2_title')</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="/admin/meals/update/{{ $meal['id'] }}" method="post">
                              {{ csrf_field() }}
                              @if (session('Error'))
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('Error') }}
                              </div>
                              @endif
                                <div class="form-group input-group">
                                    <span class="input-group-addon">套餐名称</span>
                                    <input id="meal" type="text" class="form-control" name="goods_meals_name" value="{{ $meal['goods_meals_name'] }}" placeholder="请输入套餐名称">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">套餐详情</span>
                                    <input  id="detail" type="text" class="form-control" name="goods_meals_detail" value="{{ $meal['goods_meals_detail'] }}" placeholder="请输入套餐详情">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">套餐价格</span>
                                    <input type="text" id="price" class="form-control" name="goods_meals_price" value="{{ $meal['goods_meals_price'] }}" placeholder="请输入套餐详情">
                                </div>
                                <input type="submit" class="btn btn-primary" value="提交">
                                <input type="reset" class="btn btn-default" value="重置">
                              </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                      </div>
                    <!-- /.row (nested) -->
                  </div>
                <!-- /.panel-body -->
              </div>
            <!-- /.panel -->
          </div>
        <!-- /.col-lg-12 -->
      </div>
	
    <!-- /.row -->
	 <script type="text/javascript">    
          isName = true;
          isDetail = true;
          isPrice = true;

          $('#meal').change(function(){
              var meal = $(this).val();
              if(meal==0 || meal==''){
                isName = false;     
              }else{
                isName = true;
              }
          });

          $('#detail').change(function(){
              var detail = $(this).val();
              if(detail==0 || detail==''){
                isDetail = false;
              }else{
                isDetail = true;
              }
          });

          $('#price').change(function(){
              var price = $(this).val();
              if(price==0 || price==''){
                isPrice = false;
              }else{
                isPrice = true;
              }
          });

          myform.onsubmit = function(){
              if(isName && isDetail && isPrice){
                return true;
              }else{
                return false;
              }
          }
    </script>
@endsection
