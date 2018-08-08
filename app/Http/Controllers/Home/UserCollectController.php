<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class UserCollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_session = session('Home_Session');
        $data = DB::table('u_collects')->where('uid','=',$get_session['id'])->paginate(25);
        $Collect_Goods = DB::table('goods')->get();
        return view('Home.My.collect_goods',['data'=>$data,'Collect_Goods'=>$Collect_Goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request  $request,$id)
    {
       $get_session = session('Home_Session');

       $data =  DB::table('u_collects')->where('uid','=',$get_session['id'])->where('gid','=',$id)->first();
      if ($data != null) {
        return back()->with('Error','商品已在收藏中');
      } else {
        $success = DB::table('u_collects')->insert(['uid'=>$get_session['id'],'gid'=>$id]);
        if ($success) {
        return redirect('/user/my_collect_goods')->with('Notice','添加成功');
        } else {
          return back()->with('Notice','添加失败');
         }
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
       $uid = DB::table('u_collects')->where('id','=',$id)->select('uid')->first();
       $get_session = session('Home_Session');
       if ($uid['uid']==$get_session['id']) {
         $data =  DB::table('u_collects')->where('id','=',$id)->delete();
         if ($data) {
           return redirect('/user/my_collect_goods')->with('Notice','删除成功');
         } else {
           return redirect('/user/my_collect_goods')->with('Notice','删除失败');
         }
      } else {
        return redirect('/user/my_collect_goods')->with('Notice','删除失败');
      }

    }

}
