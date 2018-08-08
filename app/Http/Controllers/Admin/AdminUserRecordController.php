<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\UsersModel;
class AdminUserRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $Search = $request->input('Search');
        $data = UsersModel::where('u_name','like','%'.$Search.'%')->orderBy('id','asc')->paginate(5);
        return view('Admin.User.record',['Search'=>$Search,'data'=>$data]);
    }

    /**
     * 消费记录显示
     *
     * @return \Illuminate\Http\Response
     */
    public function balance_index(Request $request)
    {
        //
        $Search = $request->input('Search');
        $data = UsersModel::where('u_name','like','%'.$Search.'%')->orderBy('id','asc')->paginate(5);
        return view('Admin.User.brecord_record',['Search'=>$Search,'data'=>$data]);
    }

    /**
     * 消费记录显示
     *
     * @return \Illuminate\Http\Response
     */
    public function dl_index(Request $request)
    {
        //
        $Search = $request->input('Search');
        $data = UsersModel::where('u_name','like','%'.$Search.'%')->orderBy('id','asc')->paginate(5);
        return view('Admin.User.dlrecord',['Search'=>$Search,'data'=>$data]);
    }

    /**
     * 消费记录显示
     *
     * @return \Illuminate\Http\Response
     */
    public function collect_index(Request $request)
    {
        //
        $Search = $request->input('Search');
        $data = UsersModel::where('u_name','like','%'.$Search.'%')->orderBy('id','asc')->paginate(5);
        return view('Admin.User.Collect_record',['Search'=>$Search,'data'=>$data]);
    }

    //浏览
    public function browse_index(Request $request)
    {
      $Search = $request->input('Search');
      $data = UsersModel::where('u_name','like','%'.$Search.'%')->orderBy('id','asc')->paginate(5);
      return view('Admin.User.Browse_record',['Search'=>$Search,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        //

        isset($_GET['Record']) ? $_GET['Record'] : '' ;
        if (empty($_GET['Record'])) {
          return redirect('/admin/user/record')->with('Error','页面不存在，请传入正确参数！');
        }
        //登录记录
        if ($_GET['Record'] == 'dlrecord') {
          $data = DB::table('u_dlrecords')->where('user_id','=',$id)->orderBy('id','desc')->paginate(5);
          return view('Admin.Record.UDlu_record',['data'=>$data]);
        }
        //收藏
        if ($_GET['Record'] == 'collect') {
          //$data = DB::table('users')->->paginate(25);
          $data = DB::table('u_collects')->where('uid','=',$id)->orderBy('id','desc')->paginate(5);
          $Goods_data = DB::table('goods')->get();
          return view('Admin.Record.UCollect_record',['data'=>$data,'Goods_data'=>$Goods_data]);
        }
        //消费
        if ($_GET['Record'] == 'balance') {
          $U_orders = DB::table('u_orders')->get();
          $data = DB::table('u_expenses')->where('uid','=',$id)->orderBy('id','desc')->paginate(5);
          return view('Admin.Record.UBalance_record',['data'=>$data,'U_orders'=>$U_orders]);
        }

        //浏览记录
        if ($_GET['Record'] == 'browse') {
          $data = DB::table('u_browse')->where('uid','=',$id)->orderBy('id','desc')->paginate(5);
          $Goods_data = DB::table('goods')->get();
          return view('Admin.Record.UBrowse_record',['data'=>$data,'Goods_data'=>$Goods_data]);
        }
    }

}
