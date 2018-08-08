<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoodInsertRequest;
use App\Models\Admin\GoodsModel;
use App\Models\Admin\GoodsDetails;
use App\Models\Admin\CateModel;
use App\Models\GoodsMondels;

class AdminGoodsController extends Controller
{
    /**
     * 上
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request)
    {
        //
        check_admin_purview('4');
        if($request->input('id')){
            $id = $request->input('id');
            $ca = $request->all();
           // echo $ca['id'];
            $cates1 = DB::table('cates')->get();
            $pid = [];
            foreach($cates1 as $k=>$v){
                if($v['pid']==$ca['id']){
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
            $data = DB::table('goods')->whereIn('goods_cates',$ids)->paginate(3);
            $detail = GoodsDetails::all();
            $cate = CateModel::select('id','cname','pid','path',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
            return view('Admin.Goods.list',['data'=>$data,'detail'=>$detail,'cate'=>$cate,'id'=>$id]);
        }else{
            $id = 0;
            $data = GoodsModel::paginate(5);
            $detail = GoodsDetails::all();
            $cate = CateModel::select('id','cname','pid','path',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
            return view('Admin.Goods.list',['data'=>$data,'detail'=>$detail,'cate'=>$cate,'id'=>$id]);
        }   


    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        check_admin_purview('4');
        $user = DB::table('users')->get();
        $cate = CateModel::all();
        $meal = DB::table('goods_meals')->select('id','goods_meals_detail')->get();

        return view('Admin.Goods.add',['user'=>$user,'cate'=>$cate,'meal'=>$meal]);
    }

    /**
     * 保存上传商品数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         check_admin_purview('4');
         $request->flash();
         $data = $request->all();
         $get_session = session('Admin_Session');
          //事务回滚开始
         DB::beginTransaction();
          // 判断主图片是否存在
         if($data['goods_pic']){

           //执行添加数据  返回ID
           if($data['goods_sales_status']){
             $gid =  DB::table('goods')->insertGetId([
               'goods_name'=>$data['goods_name'],
               'goods_sn'=>$data['goods_sn'],
               'goods_cates'=>$data['goods_cates'],
               'goods_discript'=>$data['goods_discript'],
               'goods_pic'=>$data['goods_pic'],
               'goods_price'=>$data['goods_price'],
               'goods_sales_status'=>$data['goods_sales_status'],
               'goods_sales_price'=>$data['goods_sales_price'],
               'goods_sales_start'=>strtotime($data['goods_sales_start']),
               'goods_sales_end'=>strtotime($data['goods_sales_end']),
               'goods_status'=>$data['goods_status'],
               'handler'=>$get_session['a_name'],
               'hander_time'=>date('Y-m-d H:i:s',time())
             ]);
           }else{
              $gid =  DB::table('goods')->insertGetId([
                'goods_name'=>$data['goods_name'],
                'goods_sn'=>$data['goods_sn'],
                'goods_cates'=>$data['goods_cates'],
                'goods_discript'=>$data['goods_discript'],
                'goods_pic'=>$data['goods_pic'],
                'goods_price'=>$data['goods_price'],
                'goods_status'=>$data['goods_status'],
                'handler'=>$get_session['a_name'],
                'hander_time'=>date('Y-m-d H:i:s',time())
              ]);
           }
          }



          //创建多文件上传对象
          if($data['goods_pics']){
            //拼接套餐
            $goods_set_meals = $data['meal1'].','.$data['meal2'];
            //执行添加数据  返回ID
            $num = DB::table('goods_details')->insert([
              'gid'=>$gid,'goods_score'=>$data['goods_score'],
              'goods_nums'=>$data['goods_nums'],
              'goods_pics'=>$data['goods_pics'],
              'goods_tail'=>$data['goods_tail'],
              'goods_set_meals'=>$goods_set_meals,
              'goods_detail_pic'=>$data['goods_detail_pic']
            ]);
           }
           if($gid && $num){
                DB::commit();
                return redirect('/admin/goods/index')->with('Success','添加商品成功');;
           }else{
                DB::rollBack();
                return back()->with('Error','添加商品失败');;
           }

    }

    /**
     * 加载修改商品模板
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询此id在关联数据
        check_admin_purview('4');
        $goods = DB::table('goods')->where('id','=',$id)->get();
        $goods = $goods[0];
        $details = DB::table('goods_details')->where('gid','=',$id)->get();
       
        $details = $details[0];
        $meal = DB::table('goods_meals')->select('id','goods_meals_detail')->get();
        $cate = CateModel::all();
        if($goods && $details){
          return view('Admin.Goods.edit',['goods'=>$goods,'details'=>$details,'cate'=>$cate,'meal'=>$meal]);
        }else{
          return back();
        }


    }

    /**
     * 更新商品数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        check_admin_purview('4');
         $data = $request -> all();
         $get_session = session('Admin_Session');
          //事务回滚开始
         DB::beginTransaction();
          // 判断主图片是否存在
         if($data['goods_pic']){

           //执行添加数据  返回ID
           if($data['goods_sales_status']){
             $gid =  DB::table('goods')->where('id','=',$id)->update([
               'goods_name'=>$data['goods_name'],
               'goods_sn'=>$data['goods_sn'],
               'goods_cates'=>$data['goods_cates'],
               'goods_discript'=>$data['goods_discript'],
               'goods_pic'=>$data['goods_pic'],
               'goods_price'=>$data['goods_price'],
               'goods_sales_status'=>$data['goods_sales_status'],
               'goods_sales_price'=>$data['goods_sales_price'],
               'goods_sales_start'=>strtotime($data['goods_sales_start']),
               'goods_sales_end'=>strtotime($data['goods_sales_end']),
               'goods_status'=>$data['goods_status'],
               'handler'=>$get_session['a_name'],
               'hander_time'=>date('Y-m-d H:i:s',time())
             ]);
           }else{
              $gid =  DB::table('goods')->where('id','=',$id)->update([
                'goods_name'=>$data['goods_name'],
                'goods_sn'=>$data['goods_sn'],
                'goods_cates'=>$data['goods_cates'],
                'goods_discript'=>$data['goods_discript'],
                'goods_pic'=>$data['goods_pic'],
                'goods_price'=>$data['goods_price'],
                'goods_status'=>$data['goods_status'],
                'goods_sales_status'=>$data['goods_sales_status'],
                'handler'=>$get_session['a_name'],
                'hander_time'=>date('Y-m-d H:i:s',time())
              ]);
           }
          }


          //创建多文件上传对象
           if($data['goods_pics']){
            //拼接套餐
            $goods_set_meals = $data['meal1'].','.$data['meal2'];
            //执行添加数据  返回ID
            $num = DB::table('goods_details')->where('gid','=',$id)->update([
              'goods_score'=>$data['goods_score'],
              'goods_nums'=>$data['goods_nums'],
              'goods_pics'=>$data['goods_pics'],
              'goods_tail'=>$data['goods_tail'],
              'goods_set_meals'=>$goods_set_meals,
              'goods_detail_pic'=>$data['goods_detail_pic']
            ]);
           }
           
           if($gid && $num){
                DB::commit();
                return redirect('/admin/goods/index')->with('Success','修改商品成功');
           }else{
                DB::rollBack();
                return back()->with('Error','修改商品失败');
           }

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
        check_admin_purview('4');
        $order = GoodsModel::find($id);
        $res = DB::table('goods_details')->where('gid','=',$id)->delete();
        if($order -> delete() && $res){
            return redirect('/admin/goods/index')->with('Success','删除商品成功');
        }else{
            return redirect('/admin/goods/index')->with('Error','删除商品失败');;
        }

    }

    public function delAll(Request $request)
    {
        //
      $res = $request ->all();
      DB::beginTransaction();
      if($res['item']){
        $num1 = DB::table('goods')->whereIn('id',$res['item'])->delete();
        $num2 = DB::table('goods_details')->whereIn('gid',$res['item'])->delete();
      }
      if($num1 && $num2){
        DB::commit();
        return redirect('/admin/goods/index');
      }else{
        DB::rollBack();
        return back();
      }
    }
}
