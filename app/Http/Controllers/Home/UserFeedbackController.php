<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Models\Admin\FeedbackModel;
class UserFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $get_session = session('Home_Session');
        $Feedback_data = FeedbackModel::where('uid','=',$get_session['id'])->orderBy('id','asc')->paginate(25);
        return view('Home.My.feedback',['Feedback_data'=>$Feedback_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = $request->except('_token');
        $db = DB::table('u_feedbacks')->insert([
          'uid'=>$data['m_id'],
          'feedbacks_email'=>$data['m_email'],
          'feedbacks_name'=>$data['fk_name'],
          'feedbacks_content'=>$data['fk_detail'],
          'feedbacks_time'=>time()
        ]);
        if ($db) {
          return redirect('/user/my_feedback')->with('Notice','提交成功');
        }else{
          return back()->with('Notice','提交失败');
        }
    }

}
