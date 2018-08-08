<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminScoreOrderController extends Controller
{
    /**
    * 积分订单列表
    *
    *
    */
    public function index(Request $request)
    {
        if($request->input('uname')){
          	$req = $request->input('uname');
            $data = DB::table('goods_scores_orders')->orderBy('id','desc')->paginate(5);
          	$user = DB::table('users')->where('u_name','like','%'.$req.'%')->select('id','u_name')->get();
            $s_goods = DB::table('scores_goods')->get();
        }else if($request->input('order')){
          	$req = $request->input('order');
            $data = DB::table('goods_scores_orders')->where('order_sn','=',$req)->paginate(5);
			$user = DB::table('users')->select('id','u_name')->get();
          	$s_goods = DB::table('scores_goods')->get();          
        }else{
            $data = DB::table('goods_scores_orders')->orderBy('id','desc')->paginate(5);
          	$user = DB::table('users')->select('id','u_name')->get();
          	$s_goods = DB::table('scores_goods')->get();
        }
       
/*        echo "<pre>";
        var_dump($user);

        return;
*/
        return view('Admin.ScoreGoods.scoreorder',['data'=>$data,'user'=>$user,'s_goods'=>$s_goods]);
    }

    /**
    *   积分订单状态修改 发货
    *
    *
    */
    public function edit($id)
    {
        $get_session = session('Admin_Session');
        $res = DB::table('goods_scores_orders')->where('id','=',$id)->update(['order_status'=>1,'send_time'=>time(),'handler'=>$get_session['a_name']]);

        if($res){
             return redirect('/admin/scoreorder')->with('Success','已处理发货，请打印订单信息！');
        }else{
             return redirect('/admin/scoreorder')->with('Error','处理发货失败，请重新核实订单！');
        }

       
    }

    /**
    * 确认完成订单
    *
    *
    */
    public function success($id)
    {
       	$get_session = session('Admin_Session');
      	$time = DB::table('goods_scores_orders')->where('id','=',$id)->select('send_time')->first();
        $times = $time['send_time'] + 7*24*60*60;
      	if($times > time()){
          	return redirect('/admin/scoreorder')->with('Error','请确认在发货7天以后完成订单！');
        }else{
            $res = DB::table('goods_scores_orders')->where('id','=',$id)->update(['order_status'=>2,'get_time'=>time(),'handler'=>$get_session['a_name']]);
        	if($res){
            	 return redirect('/admin/scoreorder')->with('Success','已完成订单，请确认用户收到商品！');
        	}else{
             	return redirect('/admin/scoreorder')->with('Error','处理完成订单失败，请重新核实订单！');
       		} 
        }
        
    }

    /**
    * 积分状态批量修改
    *
    *
    */
    public function editmore()
    {

    }

}
