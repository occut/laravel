<?php

namespace App\Http\Controllers\Admin;

use \App\Functions\Category;
use App\Model\AdminNodes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AdminNodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据
//        $a = Cache::get('key'); //获取
//         Cache::forget('ResultNode'); //删除
        if ( !Cache::has('ResultNode') ) {
            $Node = AdminNodes::orderBy('sortid','asc');
            $result = $Node->get()->toArray();
            //组装成关系数组
            $result = Category::child($result,0,'node_id','pid');
            Cache::forever('ResultNode', $result); //存储
        }
        $result = Cache::get('ResultNode'); //获取
        //赋值到模板
        return view('Admin/Administrators/AdminNodesindex',['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //接收数据
        $node_id = $request->get('node_id',0);
        if ($node_id != 0){
            $content = AdminNodes::selectNodes($node_id);
        }else{
            $content = '';
        }
        //赋值到模板
        return view('Admin/Administrators/AdminNodescreate',['content'=>$content]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //数据处理
        $data = $this->data();
        //添加节点
        $value = AdminNodes::AddNodes($data);
        Cache::forget('ResultNode'); //删除
        //返回数据
        if($value['error']){
            $request->session()->flash('msg',$value['msg']);
            $request->session()->flash('error',true);
            return redirect()->route('AdminNodes.index');
        }else{
            $request->session()->flash('msg',$value['msg']);
            $request->session()->flash('error',false);
            return redirect()->route('AdminNodes.index');
        }
//
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value = AdminNodes::where('node_id',$id)->first();
        $pName=AdminNodes::where('node_id',$value->pid)->first();
        return view('Admin/Administrators/AdminNodesEdit',['content'=>$value,'pName'=>$pName]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //处理数据
        $data = $this->data();
        //添加数据
        $AdminNodes = AdminNodes::updateNodes($data);
        Cache::forget('ResultNode'); //删除
        //返回数据
        if($AdminNodes['error']){
            $request->session()->flash('msg',$AdminNodes['msg']);
            $request->session()->flash('error',true);
            return redirect()->route('AdminNodes.index');
        }else{
            $request->session()->flash('msg',$AdminNodes['msg']);
            $request->session()->flash('error',false);
            return redirect()->route('AdminNodes.edit');
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
        $value = AdminNodes::where('node_id',$id)->delete();
        Cache::forget('ResultNode'); //删除
        if($value){
            return ['msg'=>'删除用户成功','error'=>true];
        }else{
            return ['msg'=>'删除用户成功','error'=>false];
        }
    }
}
