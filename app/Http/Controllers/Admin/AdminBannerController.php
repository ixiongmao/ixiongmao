<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('banners')->get();
        return view('Admin.Banner.list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Banner.add');
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
        if (($data['b_name'] && $data['b_url'] && $data['b_pic']) == '') {
          return back()->with('Error','请确保每项不能为空！');
        }
        $db = DB::table('banners')->insert([
          'banner_status'=>$data['b_status'],
          'banner_name'=>$data['b_name'],
          'banner_url'=>$data['b_url'],
          'banner_pic'=>$data['b_pic'],
        ]);
        if ($db) {
          return redirect('/admin/banner/index')->with('Success','添加成功');
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
        $data = DB::table('banners')->find($id);
        return view('Admin.Banner.edit',['data'=>$data]);
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
        $db = DB::table('banners')->where('id','=',$id)->update([
          'banner_status'=>$data['b_status'],
          'banner_name'=>$data['b_name'],
          'banner_url'=>$data['b_url'],
          'banner_pic'=>$data['b_pic'],
        ]);
        if ($db) {
          return redirect('/admin/banner/index')->with('Success','修改成功');
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
        $db = DB::table('banners')->where('id','=',$id)->delete();
        if ($db) {
          return redirect('/admin/banner/index')->with('Success','删除成功');
        } else {
          return back()->with('Error','删除失败');
        }
    }
}
