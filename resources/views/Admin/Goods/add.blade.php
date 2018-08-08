@extends('Admin.common')

@section('AD2_title', '商品添加')

@section('Left_Nav')
    @parent
@endsection

@section('content')
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">@yield('AD2_title')</div>
          <div class="panel-body">
            <form action="/admin/goods/store" method="post" enctype="multipart/form-data" id="myform">
              {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                    <label>状态</label>
                    <label class="radio-inline">
                      <input type="radio" name="goods_status" value="0">下架</label>
                    <label class="radio-inline">
                      <input type="radio" name="goods_status" value="1" checked>上架</label></div>

                  <div class="form-group input-group">
                    <span  class="input-group-addon">商品名称</span>
                    <input style="width:250px;" id="n1" type="text" class="form-control" name="goods_name" placeholder="请输入商品名称" value="{{ old('goods_name') }}"><span class="s1"></span></div>

                  <div class="row" style="margin-bottom: 15px;">
                    <div class="col-lg-6">
                      <div class="input-group">
                        <span class="input-group-addon">商品价格</span>
                        <input type="text" id="n2" class="form-control" name="goods_price" placeholder="请输入商品价格" value="{{ old('goods_price') }}"><span class="s2"></span></div>
                      </div><br><br>
                  

                    <div class="col-lg-6">
                      <div class="input-group">
                        <span class="input-group-addon">商品库存</span>
                        <input type="text" id="n3" class="form-control" name="goods_nums" placeholder="请输入商品库存" value="{{ old('goods_nums') }}"><span class="s3"></span></div>
                  </div><br><br>
                </div>

                  <div class="row" style="margin-bottom: 15px;">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>主分类</label>
                        <select class="form-control" name="nid" id="">
                          <option value="">--请选择--</option>
                          @foreach($cate as $k => $v)
                            @if(substr_count($v->path,',')==0)
                          <option value="{{$v->id}}">{{$v->cname}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>二级分类</label>
                        <select class="form-control" name="cl2" id="cl2">
                          <option value="0">--请选择--</option>
                          @foreach($cate as $k => $v)
                            @if(substr_count($v->path,',')==1)
                              <option value="{{$v->id}}" id="{{$v->pid}}">{{$v ->cname}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>三级分类</label>
                        <select class="form-control" name="goods_cates" id="cl3">
                          <option value="0">--请选择--</option>
                          @foreach($cate as $k => $v)
                            @if(substr_count($v->path,',')==2)
                              <option value="{{$v->id}}" id="{{$v->pid}}">{{$v ->cname}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <select class="form-control" name="hid" id="">
                          @foreach($cate as $k => $v)
                            <option value="{{$v->id}}">{{$v->cname}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div><span class="s4"></span>
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-addon">商品详细</span>
                    <input type="text" id="n5" class="form-control" name="goods_discript" placeholder="请输入商品详细" value="{{ old('goods_discript') }}"><span class="s5"></span></div>
                  <div class="form-group input-group">
                    <span class="input-group-addon">商品主图</span>
                    <input type="text" class="form-control" name="goods_pic" placeholder="请输入商品主图(点击框内即可提交上传)" id="picture" value="{{ old('goods_pic') }}"><span class="s6"></span></div>
                  <div class="form-group">
                    <label>商品组图</label>
                    <textarea name="goods_pics" class="form-control" rows="3" id="slideshow">{{ old('goods_pic') }}</textarea><span class="s7"></span>
                  </div>
                  <div class="form-group">
                    <label>商品详图</label>
                    <textarea name="goods_detail_pic" class="form-control" rows="3" id="d_content">{{ old('goods_detail_pic') }}</textarea><span class="s8"></span>
                  </div>
                  <div class="form-group">
                    <label>商品参数</label>
                    <textarea name="goods_tail" class="form-control" rows="3" id="n9">{{ old('goods_tail') }}</textarea><span class="s9"></span>
                  </div>
              </div>
              <!-- /.col-lg-6 (nested) -->
              <div class="col-lg-6">
                  <div class="form-group">
                    <label>是否促销</label>
                    <label class="radio-inline">
                      <input type="radio" name="goods_sales_status" value="1" id="gss1">是</label>
                    <label class="radio-inline">
                      <input type="radio" name="goods_sales_status" value="0" checked id="gss2">否</label></div>
                  <div id="goods_discount" class="form-group input-group">
                    <span class="input-group-addon">促销价格</span>
                    <input type="text" class="form-control" name="goods_sales_price" placeholder="请输入促销价格"><span class="m1"></span></div>
                  <div id="goods_start" class="form-group input-group">
                    <span class="input-group-addon">开始时间</span>
                    <input type="text" class="form-control" name="goods_sales_start" id="sales_start"  placeholder="请输入开始时间"><span class="m2"></span></div>
                  <div  id="goods_end" class="form-group input-group">
                    <span class="input-group-addon">结束时间</span>
                    <input type="text" class="form-control" name="goods_sales_end" id="sales_end"  placeholder="请输入结束时间"><span class="m3"></span></div>
                  <div class="row" style="margin-bottom: 15px;">
                    <div class="col-lg-6">
                      <div class="input-group">
                        <span class="input-group-addon">商品编号</span>
                        <input type="text" class="form-control" name="goods_sn" placeholder="请输入商品编号" value="{{ old('goods_sn') }}" id="n10">
                        <span class="s10"></span>
                      </div>
                      <!-- /input-group --></div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                      <div class="input-group">
                        <span class="input-group-addon">商品积分</span>
                        <input type="text" class="form-control" name="goods_score" placeholder="请输入商品积分" value="{{ old('goods_score') }}">
                        <span class="s5"></span>
                      </div>
                      <!-- /input-group --></div>
                    <!-- /.col-lg-6 --></div>
                  <!-- /.row -->
                  <div class="form-group input-group">
                    <span class="input-group-addon">商品组合套餐</span>
                    <select name="meal1" class="form-control" style="width：250px;">
                      <option value="0">--请选择--</option>@foreach($meal as $k=>$v)
                      <option id="op1" value="{{ $v['id'] }}">{{ $v['goods_meals_detail'] }}</option>@endforeach</select>
                    <select name="meal2" class="form-control" style="width：250px;">
                      <option value="0">--请选择--</option>@foreach($meal as $k=>$v)
                      <option id="op2" value="{{ $v['id'] }}">{{ $v['goods_meals_detail'] }}</option>@endforeach</select></div>
              </div>
              <!-- /.col-lg-6 (nested) --></div>
              <input type="submit" class="btn btn-primary" value="提交">
                </form>
            <!-- /.row (nested) --></div>
          <!-- /.panel-body --></div>
        <!-- /.panel --></div>
      <!-- /.col-lg-12 --></div>
    <!-- /.row -->

     <script type="text/javascript">
        layui.use('laydate', function(){
          var laydate = layui.laydate;
          //执行一个laydate实例
          laydate.render({
            elem: '#sales_start', //指定元素
            type:'datetime'
          });

        });
    </script>

    <script type="text/javascript">
        layui.use('laydate', function(){
          var laydate = layui.laydate;
          //执行一个laydate实例
          laydate.render({
            elem: '#sales_end', //指定元素
            type:'datetime'
          });
        });
    </script>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
        });

        isGood = false;
        isPrice = false;
        isNum = false;
        isCate = false;
        isDiscript = false;
        // isPic = false;
        // isPics = false;
        // isDetial = false;
        isTail = false;
        isSerials = false;
        isPrices = false;
        // isStart = false;
        // isEnd = false;

        //判断商品名
        $('#n1').focus(function(){
            $('.s1').html('请输入商品名');
        });

        $('#n1').blur(function(){
            var gname = $(this).val();
            var user_preg = /^[a-zA-Z\u4e00-\u9fa5]{2,}(\-*)[a-zA-Z0-9\u4e00-\u9fa5]*$/;
            if(user_preg.test(gname)){
                 $.post('/admin/good_ajax/store',{'goods_name':gname},function(msg){
                    if(msg==1){
                        $('.s1').html("<code>商品名称已存在</code>");
                    }else{
                        isGood = true;
                        $('.s1').html('<font color="green">商品名可用</font>');
                    }
                });
            }else{
                $('.s1').html('<code><q title="商品名必须是汉字或者字母开头">商品名不符合要求</q></code>');
            }
        });

        //判断商品价格
        $('#n2').focus(function(){
           $('.s2').html('请填写商品价格');
        })

        $('#n2').blur(function(){
            var pri = parseInt($(this).val());
            if(pri<=0 || isNaN(pri)){
              $('.s2').html('<code>请填写正确的商品价格</code>');
            }else{
              isPrice = true;
              $('.s2').html('');
            }
        })


        //判断商品库存
        $('#n3').focus(function(){
           $('.s3').html('请填写商品库存');
        })

        $('#n3').blur(function(){
            var num = parseInt($(this).val());
            if(num<=0 || isNaN(num)){
              $('.s3').html('<code>请填写正确的库存数量</code>');
            }else{
              isNum = true;
              $('.s3').html('');
            }
        })

        //判断分类是否选择
        
        //判断商品详细描述信息
        $('#n5').focus(function(){
           $('.s5').html('请填写商品描述');
        })

        $('#n5').blur(function(){
            var dis = $(this).val();
            if(dis=='' || dis == 0){
              $('.s5').html('<code>商品描述不能为空</code>');
            }else{
              isDiscript = true;
              $('.s5').html('');
            }
        })

        //判断主图
       /* $('input[name=goods_pic]').focus(function(){
           $('.s6').html('请选择商品主图');
        })

        $('input[name=goods_pic]').blur(function(){
            var pic = $(this).val();
            if(pic==''){
              $('.s6').html('<code>商品主图不能为空</code>');
            }else{
              isPic = true;
              $('.s6').html('');
            }
        })

        //判断组图
        $('#slideshow').focus(function(){
           $('.s7').html('请选择商品组图');
        })

        $('#slideshow').blur(function(){
            var pics = $(this).val();
            if(pics==''){
              $('.s7').html('<code>商品组图不能为空</code>');
            }else{
              isPics = true;
              $('.s7').html('');
            }
        })

        //判断详图
        $('#d_content').focus(function(){
           $('.s8').html('请选择商品详图');
        })

        $('#d_content').blur(function(){
            var detail = $(this).val();
            if(detail==''){
              $('.s8').html('<code>商品详图不能为空</code>');
            }else{
              isDetail = true;
              $('.s8').html('');
            }
        })
*/
        //判断商品参数
        $('#n9').focus(function(){
           $('.s9').html('请填写商品详细参数');
        })

        $('#n9').blur(function(){
            var tail = $(this).val();
            if(tail==''){
              $('.s9').html('<code>商品详细参数不能为空</code>');
            }else{
              isTail = true;
              $('.s9').html('');
            }
        })

        //判断商品编号
        $('#n10').focus(function(){
            $('.s10').html('请输入商品编号');
        });

         $('#n10').blur(function(){
            var sn = $(this).val();
            var user_preg = /^[a-zA-Z]{2,}[0-9]{4,}$/;
            if(user_preg.test(sn)){
                isSerial = true;
                $('.s10').html('<font color="green">商品名可用</font>');
            }else{
                $('.s10').html('<code>商品编号必须是2位以上字母开头，以4位以上数字结尾</code>');
            }
        });

        myform.onsubmit = function(){
            if($('#gss1').checked==true){
                if(isGood && isPrice && isNum && isCate && isDiscript && isTail && isSerial){
                     return true;
                }else{
                    alert('请确认提交完成的商品信息');
                    return false;
                }
            }else{
                if(isGood && isPrice && isNum && isCate && isDiscript && isTail && isSerial && isPrice){
                     return true;
                }else{
                    alert('请确认提交完成的商品信息');
                    return false;
                }
            }      
         }
    </script>
  

    <!-- 商品分类列表 -->
    <script>
            $('select[name=hid]').hide();
            $('select[name=cl2]').hide();
            $('select[name=goods_cates]').hide();
            $('select[name=cl2] option').hide();
            $('select[name=goods_cates] option').hide();

            $('select[name=nid]').change(function(){
                $('.s4').html('一二三级分类必填！');
                $('select[name=cl2]').show();
                /*var sc1 = $('select[name=nid]');*/
             /*   if(sc1){*/
                    ids=$('select[name=nid] option:selected').val();
                    console.log(ids);
                    if(ids){
                        for(var i=0;i<$('select[name=hid] option').length;i++){
                            $('select[name=cl2] option[id='+ids+']').eq(i).show();
                            $('select[name=cl2] option[id!='+ids+']').eq(i).hide();
                            $('select[name=cl2] option[id!='+ids+']').eq(0).attr('selected',true)
                            $('select[name=goods_cates] option[id!='+ids+']').eq(0).attr('selected',true)
                        }
                     }else{
                        $('select[name=cl2]').hide();
                        $('select[name=goods_cates]').hide();

                       /*  $('select[name=c12] option[value="0"]').attr('selected',true);
                         $('select[name=goods_cates] option').eq(0).attr('selected',true);  */
                     }
            })

            $('select[name=cl2]').change(function(){
                $('select[name=goods_cates]').show()
                var ids=$('select[name=cl2] option:selected').val()
                for(var i=0;i<$('select[name=hid] option').length;i++){
                    $('select[name=goods_cates] option[id='+ids+']').eq(i).show()
                    $('select[name=goods_cates] option[id!='+ids+']').eq(i).hide()
                    $('select[name=goods_cates] option[id!='+ids+']').eq(0).attr('selected',true)
                }
            })

            $('select[name=goods_cates]').change(function(){
                var cate = $('select[name=goods_cates] option:selected').val();
                console.log(cate);
                if(cate!=0){
                  $('.s4').html('');
                  isCate = true;
                }else{
                   $('.s4').html('三级分类必填');
                }
            });

    </script>

    <!-- 搭配套餐 -->
    <script type="text/javascript">
         $('select[name=meal2] option').hide();
         $('select[name=meal1]').change(function(){
            var m1 = $(this).val();
            var m2 = $('select[name=meal2]').val();
            console.log(m2);
            if(m1){
                //console.log(m1);
                $('select[name=meal2] option[value!='+m1+']').show();
                $('select[name=meal2] option[value ='+m1+']').hide();
            }else{
                $('select[name=meal1] option').show();
                $('select[name=meal2] option').hide();
                $('select[name=meal2] option[value="0"]').attr('selected',true);
            }
         });

         $('select[name=meal2]').change(function(){
            var m3 = $('select[name=meal1]').val();
            var m4 = $(this).val();
            if(m4){
                $('select[name=meal1] option[value='+m4+']').hide();
                $('select[name=meal1] option[value!='+m4+']').show();
            }else{
                $('select[name=meal1] option').show();
                $('select[name=meal2] option[value="0"]').attr('selected',true);
            }
         });

    </script>

    <!-- 是否隐藏折扣选项 -->
    <script type="text/javascript">

           $('#goods_discount').hide();
           $('#goods_start').hide();
           $('#goods_end').hide();

           $('#gss1').click(function(){
                if($('#gss1:checked')){
                   $('#goods_discount').show();
                   $('#goods_start').show();
                   $('#goods_end').show();
                }
            });

           $('#gss2').click(function(){
                if($('#gss1:checked')){
                   $('#goods_discount').hide();
                   $('#goods_start').hide();
                   $('#goods_end').hide();
                }
            });
    </script>

    <!-- 促销价格与原价 开始结束时间 判断 -->
    <script type="text/javascript">
         $('#gss1').click(function(){
             $('input[name=goods_sales_price]').change(function(){
                  var pri = parseInt($('#n2').val());
                  var pris = parseInt($(this).val()); 
                  if(pris>=pri){
                     $('.m1').html('<code>促销价格不能高于原价</code>');
                  }else if(pris<=0 || isNaN(pris)){
                     $('.m1').html('<code>请填写正确的促销价格</code>');
                  }else{
                     $('.m1').html('');
                     isPrices = true;
                  }
             });

             $('input[name=goods_sales_start]').change(function(){ 
                 var time = Date.parse(new Date()); 
                 var start = Date.parse($(this).val());
                 if(start<=time){
                  console.log(1);
                    console.log(time);
                    console.log(start);
                    isStart = false;
                    $('.m2').html('促销开始时间不能早于当前时间');
                 }else{
                  console.log(2);
                  console.log(time);
                    console.log(start);
                    isStart= true;
                    $('.m2').html('');
                 }
             });

              $('input[name=goods_sales_end]').change(function(){      
                 var starts = Date.parse($('input[name=goods_sales_start]').val());
                 var end = Date.parse($(this).val());
                 if(starts<end){
                  console.log(3);
                    isEnd = true;
                    $('.m3').html('');
                 }else{
                  console.log(4);
                    isEnd = false;
                    $('.m3').html('促销结束时间不能早于开始时间');
                 }
              });
        });
    </script>

@endsection
