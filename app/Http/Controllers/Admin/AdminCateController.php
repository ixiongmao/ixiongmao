<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\CateModel;
class AdminCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        check_admin_purview('0');
        $get_session = session('Admin_Session');
        $data = CateModel::select('id','cname','pid','path','status',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->paginate(25);
        foreach ($data as $k => $v) {
             $n = substr_count($v->path,',');
             $data[$k]->cname = str_repeat('|----',$n).$data[$k]->cname;
        }
        return view('Admin.Cate.list',['data'=>$data,'get_session'=>$get_session]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        check_admin_purview('0');
        $get_session = session('Admin_Session');
        $data = CateModel::select('id','cname','pid','path','status',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        foreach ($data as $k => $v) {
             $n = substr_count($v->path,',');
             $data[$k]->cname = str_repeat('|----',$n).$data[$k]->cname;
        }
        return view('Admin.Cate.add',['data'=>$data,'get_session'=>$get_session]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        check_admin_purview('0');
        $data = new CateModel;
        $pid = $request -> input('pid','');
        if ($pid == 0) {
            $data -> path = '0';
        } else {
            $parent_data = CateModel::find($pid);
            $data -> path = $parent_data->path.','.$parent_data->id;
        }
        $data -> cname = $request -> input('cname','');
        $data -> pid = $pid;
        $data -> save();
        if ($data -> save()) {
            return redirect('/admin/cate/index')->with('Success','添加成功');
        }else{
            return back()->with('Error','添加失败');
        }
    }


    /**
     * 修改商品分类
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $get_session = session('Admin_Session');
        $cate = CateModel::find($id);
        $cates = CateModel::all();
       
        return view('Admin.Cate.edit',['cate'=>$cate,'cates'=>$cates,'get_session'=>$get_session]);
        
    }

    /**
     * 商品分类更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $res = DB::table('cates')->where('id','=',$id)->update(['cname'=>$data['cname'],'pid'=>$data['pid']]);
        if($res){
            return redirect('/admin/cate/index')->with('Success','修改成功');
        }else{
            return back()->with('Error','修改失败');
        }

    }

    /**
     * 删除分类
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $path = DB::table('cates')->where('id','=',$id)->select('path')->get();
        $num = substr_count($path['0']['path'],',');
        if($num==0 || $num==1){
            return back()->with('Error','删除失败,非末级分类不允许删除！');
        }else{
            $res = DB::table('cates')->where('id','=',$id)->delete();
            if($res){
                return redirect('/admin/cate/index')->with('Success','删除成功');
            }else{
                return back()->with('Error','删除失败');
            }  
        }

       

        
    }
}
