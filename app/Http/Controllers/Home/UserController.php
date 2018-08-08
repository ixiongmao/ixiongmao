<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Home.User.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Ajax(Request $request)
    {
        //
        isset($_GET['do']) ? $_GET['do'] : '' ;
        if ($_GET['do'] == 'my_information') {
          $data = $request->only(['m_id','m_password', 'm_passwd']);
          if ((strlen($data['m_password'])>5) && (strlen($data['m_password'])<19)) {
            if ($data['m_password'] == $data['m_passwd']) {
              $db = DB::table('users')->where('id','=',$data['m_id'])->update(['u_password'=>Hash::make($data['m_password'])]);
              if ($db == '1') {
                echo '修改成功';
              } else {
                echo '修改失败';
              }

            } else {
              echo '二次密码不一样！';
            }
          } else {
            echo '密码格式不正确.';
          }
        }

        if ($_GET['do'] == 'my_informationImg') {
          $data = $request->only(['m_id','m_photo']);
          if ($data['m_photo'] == null) {
            echo '头像不能为空';
          } else {
            $db = DB::table('users')->where('id','=',$data['m_id'])->update(['u_photo'=>$data['m_photo']]);
            if ($db == '1') {
              echo '修改成功！';
            } else {
              echo '修改失败';
            }

          }
        }

        if ($_GET['do'] == 'my_informationZiliao') {
          $data = $request->only(['m_id','m_sex']);
          if ($data['m_sex'] == null) {
            echo '性别不能为空';
          } else {
            $db = DB::table('users')->where('id','=',$data['m_id'])->update(['u_sex'=>$data['m_sex']]);
            if ($db == '1') {
              echo '修改成功！';
            } else {
              echo '修改失败.';
            }

          }
        }

        if ($_GET['do'] == 'my_informationPhone') {
          $data = $request->only(['m_id','m_phone']);
          if ($data['m_phone'] == null) {
            echo '手机号不能为空';
          } else {
            $db = DB::table('users')->where('u_phone','=',$data['m_phone'])->first();
            if ($db == null) {
              $db1 = DB::table('users')->where('id','=',$data['m_id'])->update(['u_phone'=>$data['m_phone']]);
              if ($db1 == '1') {
                echo '修改成功！';
              } else {
                echo '修改失败';
              }
            } else {
              echo '手机号已存在';
            }

          }
        }

    }

}
