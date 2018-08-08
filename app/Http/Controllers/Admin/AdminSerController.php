<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminSerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('service')->get();
        return view('Admin.Ser.list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Ser.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $db = DB::table('service')->insert([
          'service_status'=>$data['s_status'],
          'service_title'=>$data['s_title'],
          'service_content'=>$data['s_content']
        ]);
        if ($db) {
          return redirect('/admin/ser/index')->with('Success','添加成功');
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
        $data = DB::table('service')->where('id','=',$id)->first();
        return view('Admin.Ser.edit',['data'=>$data]);
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
        $data = $request->except('_token');
        $db = DB::table('service')->where('id','=',$id)->update([
          'service_status'=>$data['s_status'],
          'service_title'=>$data['s_title'],
          'service_content'=>$data['s_content']
        ]);
        if ($db) {
          return redirect('/admin/ser/index')->with('Success','修改成功');
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
        $db = DB::table('service')->where('id','=',$id)->delete();
        if ($db) {
          return redirect('/admin/ser/index')->with('Success','删除成功');
        } else {
          return back()->with('Error','删除失败');
        }
    }
}
