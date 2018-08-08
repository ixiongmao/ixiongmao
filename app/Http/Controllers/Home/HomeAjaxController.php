<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeAjaxController extends Controller
{
      public function Ajax(Request $request)
      {
        isset($_GET['do']) ? $_GET['do'] : '' ;
        if (empty($_GET['do'])) {
          return 'NotFound';
        }
        //评论AJAX
        if ($_GET['do'] == 'Comment') {
          $data = $request->except('_token','do');
          if ($data['m_content'] == '') {
            return 'Undefined';
          }
          $db_comments = DB::table('u_comments')->where('user_id','=',$data['m_id'])->where('goods_id','=',$data['goods_id'])->first();
          if ($db_comments != null) {
            return 'HaveComments';
          }

          $db = DB::table('u_comments')->insert([
            'comment_status'=>'1',
            'user_id'=>$data['m_id'],
            'goods_id'=>$data['goods_id'],
            'comment_content'=>$data['m_content'],
            'comment_time'=>time()
          ]);
          $db1 = DB::table('u_orders')->where('user_id','=',$data['m_id'])->where('goods_id','=',$data['goods_id'])->update(['orders_status'=>'3']);
          if ($db && $db1) {
            echo '评论成功';
          } else {
            echo '评论失败';
          }

        }

        //余额充值Ajax
        if ($_GET['do'] == 'Balance_Recharge') {
          $Recharge_kahao = $request->input('Recharge_kahao');
          $Recharge_mima = $request->input('Recharge_mima');
          if (empty($Recharge_kahao) && empty($Recharge_mima)) {
            return 'Empty_Error';
          }
          $get_session = session('Home_Session');
          $Recharge_data = DB::table('u_balance_kami')->where('kami_status',0)->where('kami_name',$Recharge_kahao)->where('kami_password',$Recharge_mima)->get();
          $User_data = DB::table('users')->where('id',$get_session['id'])->first();

          if ($Recharge_data) {
			if ($User_data['u_money'] >= '900000000.00') {
              return 'JinETaiDaNot';
            }
            
            $Recharge_db = DB::table('u_balance_kami')->where('kami_status',0)->where('kami_name',$Recharge_kahao)->where('kami_password',$Recharge_mima)->first();

            $rental = $Recharge_db['kami_denomination']+$User_data['u_money'];

            $User_db = DB::table('users')->where('id',$get_session['id'])->update(['u_money'=>$rental]);

            $Recharge_db_modify = DB::table('u_balance_kami')->where('id',$Recharge_db['id'])->update([
              'kami_status'=>1,
              'uid'=>$get_session['id'],
              'kami_modify_time'=>time()
            ]);

            $u_expenses = DB::table('u_expenses')->insert([
            'uid'=>$get_session['id'],
            'ex_status'=>1,
            'ex_money'=>$Recharge_db['kami_denomination'],
            'ex_orderid'=>'CZ'.date('YmdHis',time()).mt_rand(10000,99999),
            'ex_remark'=>'于'.date('Y-m-d H:i:s',time()).' 充值了余额,金额为：'.$Recharge_db['kami_denomination'].'元,IP为：'.$_SERVER['REMOTE_ADDR'],
            'ex_time'=>time()
            ]);

            if ($Recharge_db && $User_db && $Recharge_db_modify && $u_expenses) {
              return 'Success';
            } else {
              return 'Error';
            }
          } else {
            return 'Kami_NotFound';
          }

        }

        //无
      }
}
