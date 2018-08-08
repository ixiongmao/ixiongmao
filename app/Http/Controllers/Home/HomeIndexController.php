<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\Admin\CateModel;
use App\Models\Admin\GoodsModel;
use App\Models\Admin\GoodsDetails;
use App\Http\Composer\ViewComposers;

class HomeIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        //
        $banner = DB::table('banners')->where('banner_status','=','1')->get();
        $guanggao = DB::table('advertises')->where('ad_status','=','1')->orderBy('id','desc')->paginate(2);
        $News = DB::table('news')->where('news_status','=','1')->orderBy('id','desc')->paginate(5);
        $Promotion = DB::table('goods')->where('goods_sales_status','=','1')->orderBy('hander_time','desc')->get();
        $I_Cates = CateModel::select('id','cname','pid','path',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        $I_Goods = DB::table('goods')->where('goods_status','1')->get();
        $cate3 = [];
        foreach($I_Cates as $k=>$v){
            if(substr_count($v->path,',')==2){
                $a = $v->id;
                $b = $v->pid;
                $cate3[] = ['id'=>$a,'pid'=>$b];
            }
        }
        array_multisort(array_column($cate3,'id'),SORT_ASC,$cate3);
        return view('Home.index',['banner'=>$banner,'guanggao'=>$guanggao,'News'=>$News,'Promotion'=>$Promotion,'I_Goods'=>$I_Goods,'I_Cates'=>$I_Cates,'cate3'=>$cate3]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request,$id)
    {
        //
        $cates1 = DB::table('cates')->get();
        $pid = [];
        foreach($cates1 as $k=>$v){
            if($v['pid']==$id){
                $pid[] = $v['id'];
            }
        }
        $ids = [];
        foreach($cates1 as $k=>$v){
            foreach($pid as $va){
                if($v['pid']==$va){
                    $ids[] =$v['id'];
                }
            }
        }
       if(empty($ids) && empty($pid)){
             $level = 1;
             $F_Cates = DB::table('cates')->where('id','=',$id)->first();
             $secondid = CateModel::find($F_Cates['id'])->pid;
             $second = CateModel::find($secondid)->cname;
             $firstid = CateModel::find($secondid)->pid;
             $first = CateModel::find($firstid)->cname;
             $L_Goods = DB::table('goods')->where('goods_cates','=',$id)->where('goods_status','1')->Paginate(8);
             return view('Home.list',['level'=>$level,'F_Cates'=>$F_Cates,'first'=>$first,'firstid'=>$firstid,'second'=>$second,'secondid'=>$secondid,'L_Goods'=>$L_Goods]);
        }elseif(empty($ids)){
             $level = 2;
             $F_Cates = DB::table('cates')->where('id','=',$id)->first();
             $firstid = CateModel::find($F_Cates['id'])->pid;
             $first = CateModel::find($firstid)->cname;
             $L_Goods = DB::table('goods')->whereIn('goods_cates',$pid)->where('goods_status','1')->Paginate(8);
             return view('Home.list',['level'=>$level,'F_Cates'=>$F_Cates,'first'=>$first,'firstid'=>$firstid,'L_Goods'=>$L_Goods]);
        }else{
             $level = 3;
             $F_Cates = DB::table('cates')->where('id','=',$id)->first();
             $L_Goods = DB::table('goods')->whereIn('goods_cates',$ids)->where('goods_status','1')->Paginate(8);
             return view('Home.list',['level'=>$level,'F_Cates'=>$F_Cates,'L_Goods'=>$L_Goods]);
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item(Request $request,$id)
    {
        //
        $get_session = session('Home_Session');
        $goods = GoodsModel::find($id);
        //var_dump($goods);
        if ($goods == '') {
          return redirect('/NotFound')->with('Notice','商品不存在！');
        }
        if (($goods->goods_status) == 0) {
          return redirect('/NotFound')->with('Notice','商品已下架！');
        }
        $three = CateModel::find($goods->goods_cates)->cname;
        $secondid = CateModel::find($goods->goods_cates)->pid;
        $second = CateModel::find($secondid)->cname;
        $firstid = CateModel::find($secondid)->pid;
        $first = CateModel::find($firstid)->cname;
        $details = DB::table('goods_details')->where('gid','=',$id)->get();
        $details = $details[0];
        $meals = DB::table('goods_meals')->select('id','goods_meals_detail','goods_meals_price')->get();

        //商品评论
        $U_Goods_user = DB::table('users')->select('id','u_name','u_photo')->get();
        $U_comments = DB::table('u_comments')->where('goods_id','=',$id)->orderBy('id','desc')->paginate(2);
        $U_comments_num = DB::table('u_comments')->where('goods_id','=',$id)->where('comment_status','=','1')->count();
        $U_orders = DB::table('u_orders')->where('user_id','=',$get_session['id'])->get();
        $url = $request->url();
        return view('Home.item',['url'=>$url,'goods'=>$goods,'first'=>$first,'firstid'=>$firstid,'second'=>$second,'secondid'=>$secondid,'three'=>$three,'details'=>$details,'meals'=>$meals,'U_comments'=>$U_comments,'U_comments_num'=>$U_comments_num,'U_orders'=>$U_orders,'U_Goods_user'=>$U_Goods_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function meal(Request $request)
    {
        $ids = $request -> input('ids');
        $prices = DB::table('goods_meals')->whereIn('id',$ids)->sum('goods_meals_price');
        if($prices){
            echo $prices;
        }else{
            echo 1;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Downloads()
    {
        //
        $Downloads = DB::table('qudongs')->paginate(10);
        return view('Home.downloads',['Downloads'=>$Downloads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Search(Request $request)
    {
        //
        $data = $request->input('key');
        $jiage = isset($_GET['jiage']) ? $_GET['jiage'] : '';
        if ($jiage == 'asc') {
          $Search = DB::table('goods')->where('goods_name','like','%'.$data.'%')->orderBy('goods_price','asc')->paginate(5);
        } else {
          $Search = DB::table('goods')->where('goods_name','like','%'.$data.'%')->orderBy('goods_price','desc')->paginate(5);
        }
        return view('Home.Search',['Sdata'=>$data,'Search'=>$Search,'jiage'=>$jiage]);
    }
  	
     public function NotFound()
    {
      return view('Home.Not_Found');
    }

}
