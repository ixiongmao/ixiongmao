<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        check_admin_purview('1');
        return view('Admin.Record.list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Ajax()
    {
        //
        isset($_GET['do']) ?  $_GET['do'] : '';

        if ($_GET['do'] == 'AdminRecord') {
          $db = DB::table('admin_records')->where('admin_time','<',strtotime('-5 minute'))->delete();
          if ($db) {
            return '清除成功！';
          } else {
            return '清除失败，未有5分钟前的登录记录！';
          }
        }
		//
        if ($_GET['do'] == 'Rechargekamis') {
          $db = DB::table('u_balance_kami')->truncate();
          if ($db == NULL) {
            return '清除成功！';
          }
        }
		//
        if ($_GET['do'] == 'IntegralRecords') {
          $db = DB::table('goods_scores')->truncate();
          if ($db == NULL) {
            return '清除成功！';
          }
        }
      
    }

}
