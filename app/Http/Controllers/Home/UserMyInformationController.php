<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\CateModel;
class UserMyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Home.My.Information');
    }


	/**
	* 用户积分列表
	*
	*
	*/
	public  function scoreInfo()
	{
		//

    $get_session = session('Home_Session');
    $U_score_data = DB::table('goods_scores')->where('uid','=',$get_session['id'])->orderBy('id','desc')->paginate(5);
    $Score_goods_data = DB::table('scores_goods')->get();
    return view('Home.Integral.list',['U_score_data'=>$U_score_data,'Score_goods_data'=>$Score_goods_data]);
	}

	/**
	 * 处理用户积分商品订单
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
		$get_session = session('Home_Session');
		$data = $request->all();
    if (empty($data['add_sn'])) {
      return back()->with('Error','请选择地址！');
    }
    $jifen_zengjia = DB::table('goods_scores')->where('uid','=',$get_session['id'])->where('source','=',1)->sum('score');
    $jifen_xiaofei = DB::table('goods_scores')->where('uid','=',$get_session['id'])->where('source','=',2)->sum('score');
    $U_scoure = $jifen_zengjia-$jifen_xiaofei;
    if ($U_scoure < $data['jifen_need']) {
      return back()->with('Notice','剩余积分不足，无法兑换！');
    }
      
	$res = DB::table('goods_scores_orders')->insert([
      'uid'=>$get_session['id'],
      'sgid'=>$data['sgid'],
      'add_sn'=>$data['add_sn'],
      'order_sn'=>date('YmdHis',time()).mt_rand(1000,9999),
      'order_time'=>time()
    ]);
    $db = DB::table('goods_scores')->insert([
      'uid'=>$get_session['id'],
      'score'=>$data['jifen_need'],
      'source'=>2,
      'update'=>time()
    ]);
		if($res && $db){
			return redirect('/score/scoreInfo')->with('Notice','积分兑换成功！等待官方处理发货中...');
		}else{
		    return redirect('/score/scoreInfo')->with('Notice','积分兑换失败，请重新选择兑换商品！');
		}

	}

	/**
	 * 积分兑换商品订单信息
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function scoredeal($id)
	{
		//
		$get_session = session('Home_Session');
		$scores_goods = DB::table('scores_goods')->where('id','=',$id)->get();
		$scores_goods = $scores_goods[0];
		$user_address = DB::table('u_address')->where('uid','=',$get_session['id'])->get();

		return view('Home.Integral.store',['scores_goods'=>$scores_goods,'user_address'=>$user_address]);
	}

  /**
	 * 积分兑换商品订单信息
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function list()
	{
		//
		$get_session = session('Home_Session');
        $goods_scores_orders = DB::table('goods_scores_orders')->where('uid','=',$get_session['id'])->orderBy('id','desc')->paginate(5);
		return view('Home.Integral.orders',['goods_scores_orders'=>$goods_scores_orders]);
	}

  public function Inlist($id)
  {
    //
    $get_session = session('Home_Session');
    $goods_scores_orders = DB::table('goods_scores_orders')->where('order_sn','=',$id)->first();
    $scores_goods = DB::table('scores_goods')->where('id','=',$goods_scores_orders['sgid'])->first();
    $U_address = DB::table('u_address')->where('id','=',$goods_scores_orders['add_sn'])->first();
    return view('Home.Integral.show',['Order_id'=>$id,'scores_goods'=>$scores_goods,'goods_scores_orders'=>$goods_scores_orders,'U_address'=>$U_address]);
  }
  public function sure($id)
  {
    $get_session = session('Home_Session');
    $res = DB::table('goods_scores_orders')->where('order_sn','=',$id)->update(['order_status'=>2,'get_time'=>time()]);
    $goods_scores_orders = DB::table('goods_scores_orders')->where('uid','=',$get_session['id'])->orderBy('id','desc')->paginate(5);
    if($res){
    	return view('Home.Integral.orders',['goods_scores_orders'=>$goods_scores_orders]);
    }else{
        return view('Home.Integral.orders',['goods_scores_orders'=>$goods_scores_orders]);
    }

  }

  
  
  
  
}
