<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminAddressController extends Controller
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
        $Address_data = DB::table('u_address')->where('address_name','like','%'.$Search.'%')->orderBy('id','desc')->paginate(25);
        $User_data = DB::table('users')->get();
        return view('Admin.Address.list',['Address_data'=>$Address_data,'User_data'=>$User_data,'Search'=>$Search]);
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
        $db = DB::table('u_address')->where('id','=',$id)->delete();
        if ($db) {
          return redirect('/admin/address/index')->with('Success','删除成功');
        } else {
          return back()->with('Error', '删除失败');
        }
    }
}
