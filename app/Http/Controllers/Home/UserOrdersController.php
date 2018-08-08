<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $get_session = session('Home_Session');
        $U_orders = DB::table('u_orders')->where('user_id','=',$get_session['id'])->orderBy('id','desc')->paginate(5);
        return view('Home.Orders.list',['U_orders'=>$U_orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function signfor_update(Request $request, $id)
    {
        //
        $get_session = session('Home_Session');
        $db = DB::table('u_orders')->where('id','=',$id)->update([
          'orders_status'=>'2',
        ]);
        if ($db) {
          return back()->with('Notice','签收成功！');
        } else {
          return back()->with('Notice','签收失败！');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        $U_orders = DB::table('u_orders')->where('orders_orderid','=',$id)->first();
        $U_address = DB::table('u_address')->where('id','=',$U_orders['address_id'])->first();
        $U_goods = DB::table('goods')->get();

        $tt =  substr_count($U_orders['orders_price'],',');
        $data = explode(',',$U_orders['orders_price']);
        return view('Home.Orders.show',['Order_id'=>$id,'U_orders'=>$U_orders,'U_address'=>$U_address,'U_goods'=>$U_goods,'data'=>$data,'tt'=>$tt]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $get_session = session('Home_Session');
      $data = $request->except('_token','x','y');
      $U_user = DB::table('users')->where('id','=',$get_session['id'])->first();
      if (empty($data['address_id'])) {
        return back()->with('Notice','请选择地址,或者去个人中心添加默认地址！');
      }
      if ($U_user['u_money'] >= $data['totalpricenums']) {
        $sum = $U_user['u_money']-$data['totalpricenums'];
        $users_db = DB::table('users')->where('id','=',$get_session['id'])->update(['u_money'=>$sum]);
        if (!empty($data['o_meal_name'])) {
          $orders_db = DB::table('u_orders')->insertGetId([
            'user_id'=>$get_session['id'],
            'address_id'=>$data['address_id'],
            'goods_id'=>implode(',',$data['goods_id']),
            'orders_status'=>0,
            'orders_buying_price'=>implode(',',$data['danjia']),
            'orders_number'=>implode(',',$data['o_number']),
            'orders_price'=>implode(',',$data['goods_price']),
            'orders_meal_name'=>$data['o_meal_name'],
            'orders_meal_price'=>$data['o_meal_price'],
            'orders_total_prices'=>$data['totalpricenums'],
            'orders_paymethod'=>'余额支付',
            'orders_orderid'=>date('YmdHis',time()).mt_rand(10000,99999),
            'orders_score'=>$data['integral'],
            'orders_time'=>time()
          ]);
        } else {
          $orders_db = DB::table('u_orders')->insertGetId([
            'user_id'=>$get_session['id'],
            'address_id'=>$data['address_id'],
            'goods_id'=>implode(',',$data['goods_id']),
            'orders_status'=>0,
            'orders_buying_price'=>implode(',',$data['danjia']),
            'orders_number'=>implode(',',$data['o_number']),
            'orders_price'=>implode(',',$data['goods_price']),
            'orders_total_prices'=>$data['totalpricenums'],
            'orders_paymethod'=>'余额支付',
            'orders_orderid'=>date('YmdHis',time()).mt_rand(10000,99999),
            'orders_score'=>$data['integral'],
            'orders_time'=>time()
          ]);
        }
          $u_expenses = DB::table('u_expenses')->insert([
          'uid'=>$get_session['id'],
          'ex_status'=>0,
          'ex_orders_id'=>$orders_db,
          'ex_money'=>$data['totalpricenums'],
          'ex_orderid'=>'Ex'.date('YmdHis',time()).mt_rand(10000,99999),
          'ex_remark'=>'于'.date('Y-m-d H:i:s',time()).'购买了商品,金额为：'.$data['totalpricenums'].'元,IP为：'.$_SERVER['REMOTE_ADDR'],
          'ex_time'=>time()
        ]);

        $u_score = DB::table('goods_scores')->insert([
          'uid'=>$get_session['id'],
          'score'=>$data['integral'],
          'source'=>1,
          'update'=>time()
        ]);
        $cars_db = DB::table('shop_carts')->where('uid','=',$get_session['id'])->delete();
        if ($users_db && $u_expenses && $orders_db && $cars_db && $u_score) {
          Mail::send('Home.Email.SendSuccessGoods',['m_name'=>$U_user['u_name'],'Get_ip'=>$_SERVER['REMOTE_ADDR'],'totalpricenums'=>$data['totalpricenums'],'integral'=>$data['integral'],'orders_time'=>time()],function($message) use ($U_user) {
            $to = $U_user['u_email'];
            $message ->to($to)->subject('【严选】官方-我们已收到您的订单');
          });
          return redirect('/user/my_orders')->with('Notice','购买成功！');
        }
      } else {
        return back()->with('Notice','余额不足,请及时充值！');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
