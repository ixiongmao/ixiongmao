<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminNavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Nav_data = DB::table('navs')->get();
        return view('Admin.Nav.list',['Nav_data'=>$Nav_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Nav.add');
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
        $data = $request->except('_token');
        $db = DB::table('navs')->insert([
          'nav_status'=>$data['n_status'],
          'nav_name'=>$data['n_name'],
          'nav_url'=>$data['n_url'],
        ]);
        if ($db) {
          return redirect('/admin/nav/index')->with('Success','添加成功');
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
        $data = DB::table('navs')->find($id);
        return view('Admin.Nav.edit',['data'=>$data]);
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
        $data = $request->except('_token');
        $db = DB::table('navs')->where('id','=',$id)->update([
          'nav_status'=>$data['n_status'],
          'nav_name'=>$data['n_name'],
          'nav_url'=>$data['n_url'],
        ]);
        if ($db) {
          return redirect('/admin/nav/index')->with('Success','修改成功');
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
        $db = DB::table('navs')->where('id','=',$id)->delete();
        if ($db) {
          return redirect('/admin/nav/index')->with('Success','删除成功');
        } else {
          return redirect('/admin/nav/index')->with('Error','删除失败');
        }
    }
}
