<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminAfterSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('aftersale_site')->paginate(25);
        return view('Admin.AfterSale_Site.list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.AfterSale_Site.add');
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
        $db = DB::table('aftersale_site')->insert([
          'aftersale_site'=>$data['aftersale_site'],
          'aftersale_phone'=>$data['aftersale_phone'],
          'aftersale_scope'=>$data['aftersale_scope']
        ]);
        if ($db) {
          return redirect('/admin/aftersale_site/index')->with('Success','添加成功');
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
        $data = DB::table('aftersale_site')->where('id','=',$id)->first();
        return view('Admin.AfterSale_Site.edit',['data'=>$data]);
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
        $db = DB::table('aftersale_site')->where('id','=',$id)->update([
          'aftersale_site'=>$data['aftersale_site'],
          'aftersale_phone'=>$data['aftersale_phone'],
          'aftersale_scope'=>$data['aftersale_scope']
        ]);
        if ($db) {
          return redirect('/admin/aftersale_site/index')->with('Success','修改成功');
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
        $db = DB::table('aftersale_site')->where('id','=',$id)->delete();
        if ($db) {
          return redirect('/admin/aftersale_site/index')->with('Success','删除成功');
        } else {
          return back()->with('Error','删除失败');
        }
    }
}
