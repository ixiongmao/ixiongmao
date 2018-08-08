<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeSerController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         //
        $get_session = session('Home_Session');
        $data = DB::table('server')->get();
        return view('Home.Ser.xianshi',['data'=>$data,'get_session'=>$get_session]);
    }

}
