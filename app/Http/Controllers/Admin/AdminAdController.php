<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class AdminAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = DB::table('advertises')->orderBy('id', 'asc') -> get();
        return view('Admin.Ad.list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Ad.add');
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
        $data = $request -> except(['_token','_method']);
        $db = DB::table('advertises')->insert([
          'ad_status'=>$data['ad_status'],
          'ad_name'=>$data['ad_name'],
          'ad_remark'=>$data['ad_remark'],
          'ad_pic'=>$data['ad_pic'],
          'ad_url'=> $data['ad_dizhi'],
          'ad_etime'=>strtotime($data['ad_etime']),
          'ad_time'=>time()
        ]);
        if ($db) {
          return redirect('/admin/ad/index')->with('Success','添加成功');
        } else {
          return back() -> with('Error','添加失败');
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
        $data = DB::table('advertises')->where('id','=',$id)->first();
        return view('Admin.Ad.edit',['data'=>$data]);
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
        check_admin_purview('0');
        $data = $request -> except(['_token','_method']);
        $db = DB::table('advertises')->where('id','=',$id) -> update([
          'ad_status'=>$data['ad_status'],
          'ad_name'=>$data['ad_name'],
          'ad_remark'=>$data['ad_remark'],
          'ad_pic'=>$data['ad_pic'],
          'ad_url'=>$data['ad_dizhi'],
          'ad_etime'=>strtotime($data['ad_etime'])
        ]);
        if ($db) {
          return redirect('/admin/ad/index')->with('Success','修改成功');
        } else {
          return back() -> with('Error','修改失败');
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
    }
}
