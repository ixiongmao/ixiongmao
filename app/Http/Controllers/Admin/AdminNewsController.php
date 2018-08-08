<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $Search = $request->input('Search');
        $data = DB::table('news')->where('news_name','like','%'.$Search.'%')->paginate(25);
        return view('Admin.News.list',['data'=>$data,'Search'=>$Search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.News.add');
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
        $db = DB::table('news')->insert([
          'news_status'=>$data['news_status'],
          'news_name'=>$data['news_name'],
          'news_content'=>$data['news_content'],
          'news_time'=>time()
        ]);
        if ($db) {
          return redirect('/admin/news/index')->with('Success','添加成功');
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
        $data = DB::table('news')->where('id','=',$id)->first();
        return view('Admin.News.edit',['data'=>$data]);
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
        $db = DB::table('news')->where('id','=',$id)->update([
          'news_status'=>$data['news_status'],
          'news_name'=>$data['news_name'],
          'news_content'=>$data['news_content']
        ]);
        if ($db) {
          return redirect('/admin/news/index')->with('Success','修改成功');
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
        $db = DB::table('news')->where('id','=',$id)->delete();
        if ($db) {
          return redirect('/admin/news/index')->with('Success','删除成功');
        } else {
          return back()->with('Error','删除失败');
        }
    }
}
