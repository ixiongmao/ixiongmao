<?php

function check_admin_purview($t0) {
$session = session('Admin_Session');
$db = DB::table('admins')->where('id',$session['id'])->first();
$a_permission = $db['a_permission'];
$arr_admin_permission = explode(',',$a_permission);
if (in_array($t0,$arr_admin_permission)) {

} else {
  echo <<<Notice
  <script src="/Home/layui/layui/layui.all.js"></script>
  <script type="text/javascript">
          layer.open({
            icon: 5,
            title: "提示",
            content: "您无权限操作此页面",
            move: false, //拖拽关闭
            closeBtn: 0,
            yes: function(idnex, layero) {
                  location.href = "/admin/index";
            },
        });
      </script>
Notice;
      exit();
    }
  return;
}
function GetIP($Toip) {
  $ip = json_decode(file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=".$Toip));
  $to = $ip->data;
  return $to->country.'&nbsp;'.$to->region.'&nbsp;'.$to->city.'&nbsp;运营商：'.$to->isp;
}
?>
