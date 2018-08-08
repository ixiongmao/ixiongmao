<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeAfterSaleController extends Controller
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
        $data = DB::table('aftersale_site')->where('aftersale_site','like','%'.$Search.'%')->paginate(25);
        return view('Home.AfterSale.list',['data'=>$data,'Search'=>$Search]);
    }

}
