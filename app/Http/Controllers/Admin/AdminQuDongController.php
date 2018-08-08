<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\QuDongModel;

class AdminQuDongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Search = $request->input('Search');
        $data = QuDongModel::where('qudong_name','like','%'.$Search.'%')->orderBy('id','asc')->paginate(15);
        return view('Admin.QuDong.list',['data'=>$data,'Search'=>$Search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.QuDong.add');
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
          $QuDong = new QuDongModel;
          $QuDong -> qudong_name = $data['file_name'];
          $QuDong -> qudong_files = $data['file_file'];
          $QuDong -> qudong_time = time();
          $db = $QuDong ->save();
          if ($db) {
              return redirect('/admin/qudong/index')->with('Success','添加成功');
          }else{
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
        $data = QuDongModel::find($id);
        return view('Admin.QuDong.edit',['data'=>$data]);
    }

    /**
     * Updata the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $QuDong = QuDongModel::find($id);
        $QuDong -> qudong_name = $data['file_name'];
        $QuDong -> qudong_files = $data['file_file'];
        $db = $QuDong ->save();
        if ($db) {
            return redirect('/admin/qudong/index')->with('Success','修改成功');
        }else{
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
        $QuDong = QuDongModel::find($id);
        $db = $QuDong->delete();
        if ($db) {
          return redirect('/admin/qudong/index')->with('Success','删除成功');
        } else {
          return back()->with('Error','删除失败');
        }
    }
}
