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
            <form action="/admin/scoresgoods/store" method="post" enctype="multipart/form-data" id="myform">
              {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-6">

                  <div class="form-group input-group">
                    <span  class="input-group-addon">积分商品名称</span>
                    <input style="width:250px;" id="n1" type="text" class="form-control" name="goods_scores_name" placeholder="请输入商品名称" value=""><span class="s1"></span></div>
                   <div class="form-group input-group">
                    <span  class="input-group-addon">商品所需积分</span>
                    <input style="width:250px;" id="n2" type="text" class="form-control" name="goods_scores_need" placeholder="请输入积分数" value=""><span class="s2"></span></div>
                  <div class="form-group input-group">
                    <span  class="input-group-addon">积分商品原价</span>
                    <input style="width:250px;" id="n3" type="text" class="form-control" name="goods_scores_price" placeholder="请输入原价" value=""><span class="s3"></span></div>
                  <div class="form-group input-group">
                    <span  class="input-group-addon">积分商品库存</span>
                    <input style="width:250px;" id="n2" type="text" class="form-control" name="goods_scores_num" placeholder="请输入积分商品库存" value=""><span class="s2"></span></div>
                  <div class="form-group input-group">
                    <span  class="input-group-addon">积分商品描述</span>
                    <input style="width:250px;" id="n4" type="text" class="form-control" name="goods_scores_discript" placeholder="请输入商品描述" value=""><span class="s4"></span></div>
                  <div class="form-group input-group">
                    <span class="input-group-addon">积分商品主图</span>
                    <input type="text" class="form-control" name="goods_scores_pic" placeholder="请输入商品主图(点击框内即可提交上传)" id="picture"></div>
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
  <script type="text/javascript">

      $.ajaxSetup({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
        });


      $('#n1').focus(function(){
            $('.s1').html('请输入积分商品名');
        });

      $('#n1').blur(function(){
            var gname = $(this).val();
            var user_preg = /^[a-zA-Z\u4e00-\u9fa5]{2,}\-*[a-zA-Z0-9\u4e00-\u9fa5]*$/;
            if(user_preg.test(gname)){
                 $.post('/admin/good_ajax/store',{'goods_name':gname},function(msg){
                    if(msg==1){
                        $('.s1').html("<code>积分商品名称已存在</code>");
                    }else{
                        isGood = true;
                        $('.s1').html('<font color="green">商品名可用</font>');
                    }
                });
            }else{
                $('.s1').html('<code><q title="商品名必须是汉字或者字母开头">商品名不符合要求</q></code>');
            }
        });

      $('#n2').change(){
          var num = $(this).val();
          var user_preg = /^[1-9]{1}[0-9]*/;
          if(!user_preg.test(num)){
             $('.s2').html("<code>积分商品积分数无效！</code>");
          }
      }



  </script>

@endsection
