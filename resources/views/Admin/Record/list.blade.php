@extends('Admin.common')

@section('AD2_title', '记录管理')

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
              <h4>员工登录记录</h4>
              <button name="button" class="btn btn-primary btn-block" id="AdminRecords">清除5分钟前员工登录记录<small>(Beta版本,上线后请修改其相关对应的时间！)</small></button>
              <h4>充值卡密和记录</h4>
              <button name="button" class="btn btn-primary btn-block" id="Rechargekamis" onclick="return confirm('你确定要删除吗，不可恢复！')">清除全部的充值卡密和记录</button>
              <h4>积分记录</h4>
             <button name="button" class="btn btn-primary btn-block" id="IntegralRecords" onclick="return confirm('你确定要删除吗，不可恢复！')">清除全部的积分记录</button>
          </div>
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
  </div>
  <script type="text/javascript">
    $(function() {
      $('#AdminRecords').click(function(){
        $.ajax({
          url:'/admin/Record/Ajax?do=AdminRecord',
          type:'POST',
          data:{},
          success:function(msg){
            layer.msg(msg);
          },
          dataType:'HTML',
          error:function(){
            layer.msg('服务器出了点小毛病,请重试！');
            return;
          }
        });
      })

      $('#Rechargekamis').click(function(){
        $.ajax({
          url:'/admin/Record/Ajax?do=Rechargekamis',
          type:'POST',
          success:function(msg){
            layer.msg(msg);
          },
          dataType:'HTML',
          error:function(){
            layer.msg('服务器出了点小毛病,请重试！');
          }
        });
      })

      $('#IntegralRecords').click(function(){
        $.ajax({
          url:'/admin/Record/Ajax?do=IntegralRecords',
          type:'POST',
          success:function(msg){
            layer.msg(msg);
          },
          dataType:'HTML',
          error:function(){
            layer.msg('服务器出了点小毛病,请重试！');
          }
        });
      })
      
    });
  </script>
@endsection
