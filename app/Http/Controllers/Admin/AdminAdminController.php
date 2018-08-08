<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\AdminModel;
use App\Models\Admin\AdminRecordModel;
use DB;
use Hash;

class AdminAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        check_admin_purview('1');
        $Search = $request -> input('Search');
        $data = AdminModel::where('a_name','like','%'.$Search.'%')->orderBy('id','asc')->paginate(25);
        return view('Admin.Admin.list',['data'=>$data,'Search'=>$Search]);
    }

    /**
     * Ajax
     *
     * @return \Illuminate\Http\Response
     */
    public function Ajax(Request $request)
    {
        check_admin_purview('1');
        $method = $request->method();

        if ($request->isMethod('post')) {
          $data = $request -> input('a_name');
          $db = AdminModel::where('a_name','=',$data)->first();
          if ($db == null) {
            echo 'Success';
          } else {
            echo 'Error';
          }
        } else {
            echo 'Error';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        check_admin_purview('1');
        return view('Admin.Admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        check_admin_purview('1');
        $data = $request -> except('_token');
        $Admin = new AdminModel;
        $Admin -> a_status = $data['a_status'];
        $Admin -> a_name = $data['a_name'];
        $A_data = AdminModel::where('a_name','=',$data['a_name'])->first();
        if (!$A_data == null) {
          return back()->with('Error','用户名已存在');
        }
        $Admin -> a_password = Hash::make($data['a_password']);
        $Admin -> a_permission = implode(',',$data['a_permission']);
        $Admin -> a_time = time();
        $db = $Admin -> save();
        if ($db) {
          return redirect('/admin/admin/index')->with('Success','添加成功');
        } else {
          return back()->with('Error','添加失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        check_admin_purview('1');
        $data = AdminModel::find($id);
        return view('Admin.Admin.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        check_admin_purview('1');
        $data = $request->except('_token');
        $Admin = AdminModel::find($id);
        $Admin -> a_status = $data['a_status'];
        if (empty($data['a_password'])) {

        } else {
          $Admin -> a_password = Hash::make($data['a_password']);
        }
        $Admin -> a_permission = implode(',',$data['a_permission']);
        $db = $Admin -> save();
        if ($db) {
          return redirect('/admin/admin/index')->with('Success','修改成功');
        } else {
          return back()->with('Error','修改失败');
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
        //
    	$db = DB::table('admins')->where('id','=',$id)->delete();
        if ($db) {
          return redirect('/admin/admin/index')->with('Success','删除成功');
        } else {
          return redirect('/admin/admin/index')->with('Success','删除失败');
        }
    }

    /**
     *
     *员工登录记录显示
    */
     public function Record_index(Request $request,$id)
     {
       check_admin_purview('1');
       $data = AdminRecordModel::where('admin_id','=',$id)->orderBy('id','desc')->paginate(25);
       return view('Admin.Admin.record',['data'=>$data]);
     }
}
