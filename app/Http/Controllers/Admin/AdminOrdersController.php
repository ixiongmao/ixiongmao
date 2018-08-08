<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        check_admin_purview('3');
        $Search = $request->input('Search');
        $Orders_data = DB::table('u_orders')->orderBy('id','desc')->paginate(5);
        $Goods_data = DB::table('goods')->get();
        $User_data = DB::table('users')->where('u_name','like','%'.$Search.'%')->get();
        $Address_data = DB::table('u_address')->get();
        return view('Admin.Orders.list',['Orders_data'=>$Orders_data,'Search'=>$Search,'User_data'=>$User_data,'Goods_data'=>$Goods_data,'Address_data'=>$Address_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        $Orders_show_data = DB::table('u_orders')->where('orders_orderid','=',$id)->first();
        $Address_show_data = DB::table('u_address')->where('id','=',$Orders_show_data['address_id'])->first();
        $Goods_show_data = DB::table('goods')->get();
        return view('Admin.Orders.show',['order_id'=>$id,'Orders_show_data'=>$Orders_show_data,'Address_show_data'=>$Address_show_data,'Goods_show_data'=>$Goods_show_data]);
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

        $data = $request->input('signfor_odd');
        if (empty($data)) {
          echo '单号不能为空!';
          return false;
        }
        $db = DB::table('u_orders')->where('id','=',$id)->update([
          'orders_status'=>'1',
          'orders_odd'=>$data
        ]);
        if ($db) {
          echo '单号添加或修改成功!';
        } else {
          echo '单号添加或修改失败!';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
