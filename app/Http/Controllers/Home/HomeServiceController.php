<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function service_standard()
    {
        //
        $data = DB::table('service')->get();
        return view('Home.Ser.list',['data'=>$data]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tradein()
    {
        isset($_GET['do']) ? $_GET['do'] : '' ;
        if (empty($_GET['do'])) {
          return redirect('/')->with('Notice','参数不正确或者页面不存在');
        }
        if($_GET['do'] == 'tradein') {
          return view('Home.tradein.tradein');
        } else if ($_GET['do'] == 'recycling') {
          return view('Home.tradein.recycling');
        }
    }
}
