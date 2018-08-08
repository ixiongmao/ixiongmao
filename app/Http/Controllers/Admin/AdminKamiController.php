<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $Search = $request->input('Search');
        $Data_user = DB::table('users')->get();
        $Data_balance_kami = DB::table('u_balance_kami')->orderBy('id','desc')->paginate(5);
        return view('Admin.Kami.list',['Data_user'=>$Data_user,'Data_balance_kami'=>$Data_balance_kami]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Kami.add');
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
        for ($i=0;$i < $data['kami_number'];$i++) {
          $db = DB::table('u_balance_kami')->insert([
            'kami_status'=>0,
            'kami_name'=>strtoupper(str_random(18)),
            'kami_password'=>strtoupper(str_random(18)),
            'kami_denomination'=>$data['kami_denomination'],
            'kami_time'=>time()
          ]);
        }
        if ($db) {
          return redirect('/admin/kami/index')->with('Success','添加成功');
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
        $Select_id = DB::table('u_balance_kami')->where('id',$id)->get();
        if (!$Select_id) {
          return back()->with('Error','要删除的卡密不存在');
        }
        $db = DB::table('u_balance_kami')->where('id',$id)->delete();
        if ($db) {
          return back()->with('Success','删除');
        } else {
          return back()->with('Error','删除失败');
        }
    }
}
