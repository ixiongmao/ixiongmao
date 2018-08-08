<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeNewsController extends Controller
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
        $get_session = session('Home_Session');
        $data = DB::table('news')->where('news_status','=','1')->where('news_name','like','%'.$Search.'%')->paginate(25);
        return view('Home.News.list',['data'=>$data,'get_session'=>$get_session,'Search'=>$Search]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $get_session = session('Home_Session');
        $data = DB::table('news')->where('id','=',$id)->first();
        return view('Home.News.show',['data'=>$data,'get_session'=>$get_session]);
    }

}
