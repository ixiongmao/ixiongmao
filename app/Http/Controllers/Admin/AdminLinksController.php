<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('links')->get();
        return view('Admin.Links.list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Links.add');

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
        $db = DB::table('links')->insert([
          'links_name'=>$data['links_name'],
          'links_url'=>$data['links_url'],
          'links_pic'=>$data['links_pic']
        ]);
        if ($db) {
          return redirect('/admin/links/index')->with('Success','添加成功');
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
        $data = DB::table('links')->where('id','=',$id)->first();
        return view('Admin.Links.edit',['data'=>$data]);
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
        $db = DB::table('links')->where('id','=',$id)->update([
          'links_name'=>$data['links_name'],
          'links_url'=>$data['links_url'],
          'links_pic'=>$data['links_pic']
        ]);
        if ($db) {
          return redirect('/admin/links/index')->with('Success','修改成功');
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
        $db = DB::table('links')->where('id','=',$id)->delete();
        if ($db) {
          return redirect('/admin/links/index')->with('Success','删除成功');
        } else {
          return back()->with('Error','删除失败');
        }
    }
}
