<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\GoodsModel;

class ShopCarController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_session = session('Home_Session');
        $uid = $get_session['id'];
        $shop = DB::table('shop_carts')->where('uid','=',$uid)->get();
        $total_price = DB::table('shop_carts')->where('uid','=',$uid)->sum('total_price');
        $goods = DB::table('goods')->select('id','goods_name','goods_pic','goods_price','goods_sales_start','goods_sales_end','goods_sales_price')->get();
        $goods_detail = DB::table('goods_details')->select('gid','goods_nums')->get();
        $meal = DB::table('goods_meals')->get();

       return view('Home.Shop_Car',['shop'=>$shop,'total_price'=>$total_price,'goods'=>$goods,'goods_detail'=>$goods_detail,'meal'=>$meal]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $get_session = session('Home_Session');
        $data = $request->all();
        if(isset($data['che'])){
            $meals = DB::table('goods_meals')->whereIn('id',$data['che'])->get();
            $meal_price = null;
            $meal_detail = null;
            foreach ($meals as $key => $value) {
                $meal_price += $value['goods_meals_price'];
                $meal_detail .= $value['goods_meals_detail'].',';
            }

            $total_price = $meal_price + $data['h1']*$data['number'];

            $res = DB::table('shop_carts')->insert(['uid'=>$get_session['id'],'gid'=>$data['id'],'shop_num'=>$data['number'],'total_price'=>$total_price,'meal_price'=>$meal_price,'meal_detail'=>$meal_detail]);
            return redirect('/shop_car')->with('Notice','添加成功');
        }else{
            $total_price = $data['h1']*$data['number'];
            $res = DB::table('shop_carts')->insert(['uid'=>$get_session['id'],'gid'=>$data['id'],'total_price'=>$total_price,'shop_num'=>$data['number']]);
            return redirect('/shop_car')->with('Notice','添加成功');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = $request->all();
        var_dump($data);
        $res = DB::table('shop_carts')->where('id',$data['id'])->update(['shop_num'=>$data['shop_num'],'total_price'=>$data['t']]);
        echo $res;
        if($res){
          echo "1";
        }
    }

    /**
     * 删除购物车单条记录
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = DB::table('shop_carts')->delete($id);
        if($res){
          return redirect('/shop_car')->with('Notice','删除成功');
        }

    }

    /**
    * 清空购物车
    */
    public function clearCart($id)
    {
        //
        $res = DB::table('shop_carts')->where('uid','=',$id)->delete();
        if($res){
          return redirect('/shop_car')->with('Notice','删除成功');
        }
    }

    //
    public function checkout(Request $request)
    {
      $get_session = session('Home_Session');
      $U_address = DB::table('u_address')->where('uid','=',$get_session['id'])->get();

      $U_Car = DB::table('shop_carts')->where('uid','=',$get_session['id'])->get();
      $U_CarGoods = DB::table('goods')->get();
      $U_Totalprice = DB::table('shop_carts')->where('uid','=',$get_session['id'])->sum('total_price');
      $U_Goods_details = DB::table('goods_details')->get();
      return view('Home.Shop_checkout',['U_address'=>$U_address,'U_Car'=>$U_Car,'U_CarGoods'=>$U_CarGoods,'U_Totalprice'=>$U_Totalprice,'U_Goods_details'=>$U_Goods_details]);
    }

}
