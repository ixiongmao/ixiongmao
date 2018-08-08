<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminScoreGoodController extends Controller
{
    /**
     * 积分商品列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      	
        $data = DB::table('scores_goods')->get();
        
        return view('Admin.ScoreGoods.scorelist',['data'=>$data]);
    }

    /**
     *  创建添加积分商品模板
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.ScoreGoods.scoreadd');
    }

    /**
     * 保存积分商品添加信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $get_session = session('Admin_Session');
        $data = $request->all();

        $res = DB::table('scores_goods')->insert([
          'goods_scores_name'=>$data['goods_scores_name'],
          'goods_scores_need'=>$data['goods_scores_need'],
          'goods_scores_price'=>$data['goods_scores_price'],
          'goods_scores_discript'=>$data['goods_scores_discript'],
          'goods_scores_pic'=>$data['goods_scores_pic'],
          'goods_scores_num'=>$data['goods_scores_num'],
          'goods_handler'=>$get_session['id'],
          'goods_uptime'=>date('Y-m-d H:i:s',time())
        ]);
        if($res){
            return redirect('/admin/scoregoods/list')->with('Success',"积分商品添加成功");
        }else{
            return redirect('/admin/scoresgoods')->with('Error',"积分商品添加失败");
        }


    }

    /**
     * 积分商品修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = DB::table('scores_goods')->where('id','=',$id)->get();
        $data = $data[0];

        return view('Admin.ScoreGoods.scoreedit',['data'=>$data]);
    }

    /**
     * 保存积分产品更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $get_session = session('Admin_Session');
        $data = $request->all();
        $res = DB::table('scores_goods')->where('id','=',$id)->update(['goods_scores_name'=>$data['goods_scores_name'],'goods_scores_need'=>$data['goods_scores_need'],'goods_scores_pic'=>$data['goods_scores_pic'],'goods_scores_num'=>$data['goods_scores_num'],'goods_handler'=>$get_session['id'],'goods_uptime'=>date('Y-m-d H:i:s',time())]);
        if($res){
            return redirect('/admin/scoregoods/list')->with('Success',"积分商品更新成功");
        }else{
            return redirect('/admin/scoregoods/list')->with('Error',"积分商品更新失败");
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
        $res = DB::table('scores_goods')->where('id','=',$id)->delete();
        if($res){
            return redirect('/admin/scoregoods/list')->with('Success',"积分商品删除成功");
        }else{
            return redirect('/admin/scoregoods/list')->with('Error',"积分商品删除失败");
        }
    }



}
