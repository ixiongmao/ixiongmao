<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use Hash;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\AdminRecordModel;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ixiongmao
        if (session('Admin_Session')) {
          return redirect('/admin/index')->with('Success','您已经登录成功，请先退出，重新登录！');
        } else {
          return view('Admin.Login.Login');
        }

    }

    /**
     *  登录信息查询验证
     */
    public function Save(Request $request)
    {
      $data = $request -> except('_token');
      $a_name = $data['a_name'];
      $a_passwd = $data['a_password'];
      $A_data = DB::table('admins')->where('a_name','=',$a_name)->first();
      $db = Hash::check($a_passwd, $A_data['a_password']);
      if ($db) {
        if ($A_data['a_status'] == 1) {
          DB::table('admin_records')->insert([
            'admin_id'=>$A_data['id'],
            'admin_remark'=>'员工于：'.date('Y-m-d H:i:s',time()).'登录后台,IP为：'.$_SERVER['REMOTE_ADDR'],
            'admin_ip'=>ip2long($_SERVER['REMOTE_ADDR']),
            'admin_time'=>time()]);
          session(['Admin_Session'=>$A_data]);
          return redirect('/admin/index')->with('Success','登录成功！');
        } else {
          return redirect('/admin/login')->with('Error','账号已被冻结');
        }
      } else {
        return redirect('/admin/login')->with('Error','账号或密码错误！');
      }

    }
    //退出登录
    public function logout()
    {
      $get_session = session('Admin_Session');

      $data = DB::table('admins')->where('a_name','=',$get_session['a_name'])->first();
      if (!session('Admin_Session')) {
        return redirect('/admin/login')->with('Error','请先登录！');
      }else if (session()->forget('Admin_Session') == null) {
        DB::table('admin_records')->insert([
            'admin_id'=>$data['id'],
            'admin_remark'=>'员工于：'.date('Y-m-d H:i:s',time()).'退出后台,IP为：'.$_SERVER['REMOTE_ADDR'],
            'admin_ip'=>ip2long($_SERVER['REMOTE_ADDR']),
            'admin_time'=>time()]);
        return redirect('/admin/login')->with('Error','退出成功！');
      }

    }
}
