<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminFeedbackController extends Controller
{

    /**
     * 反馈显示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Search = $request->input('Search');
        $data = DB::table('u_feedbacks')->where('feedbacks_name','like','%'.$Search.'%')->orderBy('id','asc')->paginate(25);
        $User_data = DB::table('users')->get();
        return view('Admin.Feedback.list',['data'=>$data,'Search'=>$Search,'User_data'=>$User_data]);
    }

    /**
     * 反馈删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = DB::table('u_feedbacks')->where('id','=',$id)->delete();
        //$res = $del -> delete();
        if ($del) {
          return redirect('/admin/feedback/index')->with('Success','删除成功');
        } else {
          return back()->with('Error', '删除失败');
        }

    }
}
