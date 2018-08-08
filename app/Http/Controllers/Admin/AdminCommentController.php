<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Models\Admin\CommentsModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = CommentsModel::all();
        return view('Admin.Comment.list',['data'=>$data]);
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
        $db = DB::table('u_comments')->where('id','=',$id)->delete();
        if ($db) {
          return redirect('/admin/comment/index')->with('Success','删除成功');
        } else {
          return redirect('/admin/comment/index')->with('Error','删除失败');
        }
    }
}
