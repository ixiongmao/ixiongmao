@extends('Admin.common')

@section('AD2_title', '积分商品添加')

@section('Left_Nav')
    @parent
@endsection

@section('content')
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">@yield('AD2_title')</div>
          <div class="panel-body">
            <form action="/admin/scoregoods/update/{{ $data['id'] }}" method="post" enctype="multipart/form-data" id="myform">
              {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-6">
                   
                  <div class="form-group input-group">
                    <span  class="input-group-addon">积分商品名称</span>
                    <input style="width:250px;" id="n1" type="text" class="form-control" name="goods_scores_name" value="{{ $data['goods_scores_name']}}"><span class="s1"></span></div>
                   <div class="form-group input-group">
                    <span  class="input-group-addon">商品所需积分数</span>
                    <input style="width:250px;" id="n2" type="text" class="form-control" name="goods_scores_need" value="{{ $data['goods_scores_need']}}"><span class="s2"></span></div>
                    <div class="form-group input-group">
                    <span  class="input-group-addon">积分商品库存</span>
                    <input style="width:250px;" id="n2" type="text" class="form-control" name="goods_scores_num" value="{{ $data['goods_scores_num']}}"><span class="s2"></span></div>
                 
                  <div class="form-group input-group">
                    <span class="input-group-addon">积分商品主图</span>
                    <img src="{{ $data['goods_scores_pic']}}">
                    <input type="text" class="form-control" name="goods_scores_pic" value="{{ $data['goods_scores_pic']}}" id="picture" value=""></div>      
              </div>
               
              <!-- /.col-lg-6 (nested) --></div>
              <input type="submit" class="btn btn-primary" value="提交">
              <input type="reset" class="btn btn-primary" value="重置">
                </form>
            <!-- /.row (nested) --></div>
          <!-- /.panel-body --></div>
        <!-- /.panel --></div>
      <!-- /.col-lg-12 --></div>
    <!-- /.row -->
 

@endsection
