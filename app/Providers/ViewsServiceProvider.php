<?php

namespace App\Providers;

use DB;
use App\Models\Admin\GoodsModel;
use App\Models\Admin\CateModel;
use Illuminate\Support\ServiceProvider;

use App\Models\Admin\UsersModel;
use App\Models\Admin\FeedbackModel;

class ViewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //视图Composer
        view()->composer('Admin.*',function($view){
          $get_session = session('Admin_Session');
          $U_count = UsersModel::where('u_status','=','1')->count();
          $Feedback_count = FeedbackModel::count();
          $Orders_count = DB::table('u_orders')->count();
          $ShopCar_count = DB::table('shop_carts')->count();
             $view->with('get_session',$get_session);
             $view->with('U_count',$U_count);
             $view->with('Feedback_count',$Feedback_count);
             $view->with('Orders_count',$Orders_count);
             $view->with('ShopCar_count',$ShopCar_count);
         });

        view()->composer('Home.*',function($view){
          $get_session = session('Home_Session');
           $systems = DB::table('systems')->first();
           $Nav_data = DB::table('navs')->where('nav_status','=','1')->get();
           $Cate = CateModel::select('id','cname','pid','path',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
           $good = DB::table('goods')->select('id','goods_cates','goods_name','goods_pic')->groupBy('goods_cates')->get();
           $Links = DB::table('links')->paginate(8);
           $Shop_Car_nums = DB::table('shop_carts')->where('uid','=',$get_session['id'])->count();
           $U_user = DB::table('users')->where('id','=',$get_session['id'])->first();
             $view->with('U_user',$U_user);
             $view->with('get_session',$get_session);
             $view->with('systems',$systems);
             $view->with('Nav_data',$Nav_data);
             $view->with('good',$good);
             $view->with('Cate',$Cate);
             $view->with('Links',$Links);
             $view->with('Shop_Car_nums',$Shop_Car_nums);
         });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
