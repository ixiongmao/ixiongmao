<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function records()
    {
        //
        isset($_GET['Records']) ? $_GET['Records'] : '' ;
        $get_session = session('Home_Session');
        if (empty($_GET['Records'])) {
          return redirect('/user/index')->with('Notice','地址不存在,请输入正确的地址或者参数');
        }
        //消费记录
        if ($_GET['Records'] == 'balance') {
          $U_orders = DB::table('u_orders')->get();
          $U_expense = DB::table('u_expenses')->where('uid','=',$get_session['id'])->orderBy('id','desc')->paginate(5);
          return view('Home.My.balance_records',['U_orders'=>$U_orders,'U_expense'=>$U_expense]);
        }
    }

}
