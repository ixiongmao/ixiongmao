<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use Hash;
use Validator;
use Input;
use Mail;
use App\Models\Admin\CateModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserLoginController extends Controller
{
    /**
     * 前台用户登录显示
     *
     * @return \Illuminate\Http\Response
     */
    public function Login()
    {
        if (session('Home_Session')) {
          return redirect('/')->with('Notice','您已经登录，请先退出！');
        } else {
          return view('Home.User.login');
        }

    }

    /**
     * 前台用户注册显示
     *
     * @return \Illuminate\Http\Response
     */
    public function Register()
    {
        //
        if (session('Home_Session')) {
          return redirect('/')->with('Notice','您已经登录，请先退出！');
        } else {
          return view('Home.User.register');
        }

    }

    /**
     * 前台用户忘记密码显示
     *
     * @return \Illuminate\Http\Response
     */
    public function VerifyMimaCode()
    {
        //
        if (session('Home_Session')) {
          return redirect('/')->with('Notice','您已经登录，请先退出！');
        } else {
          return view('Home.User.VerifyMimaCode');
        }

    }
    /**
     * 前台用户登录
     *
     * @return \Illuminate\Http\Response
     */
    public function LoginIndex(Request $request)
    {
      $data = $request->except('_token');
      $u_name = $data['m_name'];
      $u_passwd = $data['m_password'];
      $db = DB::table('users')->where('u_name','=',$data['m_name'])->first();
      $res = Hash::check($u_passwd, $db['u_password']);
      if ($res) {
        $verify_code = [
            'verify_code' => 'required|captcha'
        ];
        $validator = Validator::make(Input::all(), $verify_code);
        if ($validator->fails()) {
            return redirect('/login')->with('Notice','验证码错误');
        } else {
          if ($db['u_status'] == '1' && $db['u_mail_status'] == '1') {
            DB::table('u_dlrecords')->insert([
            'user_id'=>$db['id'],
            'user_remark'=>'用户于'.date('Y-m-d H:i:s',time()).'登录,IP为：'.$_SERVER['REMOTE_ADDR'],
            'user_ip'=>ip2long($_SERVER['REMOTE_ADDR']),
            'user_time'=>time()
          ]);
          session(['Home_Session'=>$db]);
          return redirect('/')->with('Notice','登录成功');
        } else {
          return redirect('/login')->with('Notice','账号已被冻结');
        }

        }
      } else {
        return back()->with('Notice','登录失败');
      }
    }

    /**
     * 前台用户注册添加
     *
     * @return \Illuminate\Http\Response
     */
     public function RegCreate(Request $request)
     {
         //
         $shuju = $request->except('_token');
         $db = DB::table('users')->where('u_name','=',$shuju['m_name'])->first();
         if ($db == null) {
           $verify_code = [
               'verify_code' => 'required|captcha'
           ];
           $validator = Validator::make(Input::all(), $verify_code);
           if ($validator->fails()) {
               return redirect('/reg')->with('Error','验证码错误');
           } else {
             $data['u_name'] = $shuju['m_name'];
             $data['u_email'] = $shuju['m_email'];
             $data['u_password'] = Hash::make($shuju['m_password']);
             $data['u_sex'] = $shuju['m_sex'];
             $data['u_phone'] = $shuju['m_phone'];
             $data['u_token'] = str_random(48);
             $data['u_time'] = time();
             $res = DB::table('users')->insertGetId($data);
             if ($res) {
               Mail::send('Home.Email.index',['user' => $data['u_name'],'token'=>$data['u_token'],'id'=>$res,'Get_ip'=>$_SERVER['REMOTE_ADDR']],function($message) use ($data) {
               $message ->to($data['u_email'])->subject('【严选】官方-注册验证');
             });
               return redirect('/login')->with('Notice','注册成功，请去验证邮箱！');
             }else{
               return redirect('/reg')->with('Notice','注册失败请重试');
             }
         }
     }
   }
    //前台邮箱验证注册
    public function Email(Request $request)
    {
      $data = $request->all();
      $userinfo = DB::table('users')->where('id',$data['id'])->first();
      if (!$userinfo && ($userinfo['u_token'] != $data['token'])) {
        return redirect('/NotFound')->with('Notice','链接失效!');
      }
      if ($userinfo['u_mail_status'] !=0 ) {
         return redirect('/NotFound')->with('Notice','该用户已经激活!');
      }
      $token = str_random(48);
      $res =  DB::table('users')->where('id',$data['id'])->update(['u_mail_status'=>1,'u_token'=>$token]);

      if ($res) {
        return redirect('/login')->with('Notice','激活成功!');
        echo "";
      }else{
        return redirect('/NotFound')->with('Notice','激活失败!');
      }
    }

    /**
     * 前台用户注册手机号重复验证、前台用户找回密码
     *
     * @return \Illuminate\Http\Response
     */
    public function Ajax(Request $request)
    {
        //
        $m_name = $request->input('m_name');
    	$m_phone = $request->input('m_phone');
        $sms_code = $request->input('sms_code');
        isset($_GET['do']) ? $_GET['do'] : '';
        if ($_GET['do'] == 'isPhone') {
          $db = DB::table('users')->where('u_phone','=',$m_phone)->first();
          if ($db == null) {
            echo 'Success';
          } else {
           echo 'Error';
          }
        }
        //手机验证码
        if ($_GET['do'] == 'VerifySendCodePhone') {
          if (empty($m_name)) {
            echo 'Error';
            return;
          } else {
            $db = DB::table('users')->where('u_name',$m_name)->first();
            $mobile_code = mt_rand(100000,999999);
            $request->session()->put('mobile_code', $mobile_code);
            // //短信接口地址
            $target = "http://106.ihuyi.com/webservice/sms.php?method=Submit";
            // 地址的参数
            $target .= "&account=C39549612&password=53631cefdeeba928cb5a842846660d57&mobile=".$db['u_phone']."&format=json&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");

            //初始化
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$target);
            // 执行后不直接打印出来
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            // 跳过证书检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // 不从证书中检查SSL加密算法是否存在
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            //执行并获取HTML文档内容
            $output = curl_exec($ch);
            echo $output;
          }
        }

        //手机验证码
        if ($_GET['do'] == 'VerifySendCodePhoneYz') {
          if (empty($sms_code)) {
            echo 'Error';
            return;
          } else {
            if ($sms_code == session('mobile_code')) {
              echo 'Success';
            } else {
              echo 'Error';
            }
          }
        }

        if ($_GET['do'] == 'VerifyMimaCodeMail') {
          $db = DB::table('users')->where('u_name',$m_name)->first();
          if ($db == null) {
            echo 'Error';
          } else {
            $u_token = str_random(48);
            $data = DB::table('users')->where('id',$db['id'])->update([
              'u_token'=>$u_token
            ]);
            Mail::send('Home.Email.Setmail',['uid'=>$db['id'],'u_token'=>$u_token,'Get_ip'=>$_SERVER['REMOTE_ADDR']],function($message) use ($db) {
            $to = $db['u_email'];
            $message ->to($to)->subject('【严选】官方-找回密码');
            });
            echo 'MailSuccess';

          }

        }
    }

    /**
     * 前台用户找回密码显示
     *
     * @return \Illuminate\Http\Response
     */
    public function SetPassword(Request $request)
    {
        //
        $data = $request->except('_token');
        $db = DB::table('users')->where('u_name','=',$data['m_name'])->first();
        if ($db == null) {
          return back()->with('Error','验证失败！');
        } else {
          return view('Home.User.SetMima',['data'=>$db]);
        }

    }

    /**
     * 前台用户找回密码显示
     *
     * @return \Illuminate\Http\Response
     */
    public function SetMailPassword(Request $request)
    {
        //
        $data = $request->all();
        $db = DB::table('users')->where('id',$data['id'])->where('u_token',$data['token'])->first();
        if (!$db) {
          return redirect('/NotFound')->with('Notice','链接错误!');
        } else {
          return view('Home.User.SetMima',['data'=>$db]);
        }
    }

    /**
     * 前台用户找回密码显示
     *
     * @return \Illuminate\Http\Response
     */
    public function UpdatePasswd(Request $request)
    {
        //
        $data = $request->except('_token');
        $db = DB::table('users')->where('id','=',$data['m_id'])->update([
          'u_password'=>Hash::make($data['m_password']),
          'u_token'=>str_random(48)
        ]);
        var_dump($db);
        if ($db == '1') {
          return redirect('/login')->with('Notice','修改成功');
        } else {
          return back()->with('Error','修改失败');
        }
    }

    public function logout()
    {   $get_session = session('Home_Session');
        if (!session('Home_Session')) {
          return redirect('/login')->with('Error','请先登录！');
        }else if (session()->forget('Home_Session') == null) {
          DB::table('u_dlrecords')->insert([
            'user_id'=>$get_session['id'],
            'user_remark'=>'用户于'.date('Y-m-d H:i:s',time()).'退出,IP为：'.$_SERVER['REMOTE_ADDR'],
            'user_ip'=>ip2long($_SERVER['REMOTE_ADDR']),
            'user_time'=>time()
          ]);
          return redirect('/login')->with('Notice','退出成功！');
        }
    }
}
