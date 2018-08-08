<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\GoodsModel;

class AdminGoodsAjaxController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          $name = $request->input('goods_name');
           $gname = DB::table('goods')->where('goods_name','=',$name)->get();
           if($gname){
            echo true;
           }
    }

}
