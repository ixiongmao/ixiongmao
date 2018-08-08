<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class HomeBrowseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_session = session('Home_Session');
        $browse  = DB::table('u_browse')->where('uid','=',$get_session['id'])->paginate(5);
        $goodss = DB::table('goods')->get();
        return view('Home.My.Browse',['browse'=>$browse,'goodss'=>$goodss]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $data = $request->input('gid');
       $get_session = session('Home_Session');
       $time = time();
       if ($get_session) {
            $true = DB::table('u_browse')->where('uid','=',$get_session['id'])->where('gid','=',$data)->first();
            if ($true) {
                DB::table('u_browse')->where('uid','=',$get_session['id'])->where('gid','=',$data)->update(['time'=>$time]);
            }else{
                DB::table('u_browse')->insert(['uid'=>$get_session['id'],'gid'=>$data,'time'=>$time]);
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
       $data =  DB::table('u_browse')->where('id','=',$id)->delete();
       if ($data) {
         return redirect('/user/my_browse/index')->with('Notice','删除成功');
       }else{
         return redirect('/user/my_browse/index')->with('Notice','删除失败');
       }
    }
}
