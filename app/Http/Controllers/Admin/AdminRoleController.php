<?php

namespace App\Http\Controllers\Admin;

use App\ClassLib\Category;
use App\Functions\LogAction;
use App\Model\Admin_role;
use App\Model\AdminNodes;
use App\Model\RoleNode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $content = Admin_role::Roleselect();
        $role = Admin_role::orderBy('role_id','asc');
        $result = $role->get()->toArray();
        $result = Category::child($result,0,'role_id','pid');
        return view('Admin/Administrators/AdminRoleindex',['content'=>$content])->with('result',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $this->data();
        if(!empty($data['id'])){
            $content = Admin_role::selectid($data['id']);
        }else{
            $content = '';
        }

//        dump($content->rolename);
//        die;
        return view('Admin/Administrators/AdminRolecreate')->with('content',$content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据
        $data = $request->all();
        //数据处理
        $data = $this->data($data);
        //添加角色
        $value = Admin_role::Addrole($data);
        //返回数据
        if($value['error']){
            $request->session()->flash('msg',$value['msg']);
            return redirect()->route('AdminRole.index');
        }else{
            $request->session()->flash('msg',$value['msg']);
            return redirect()->route('AdminRole.index');
        }
//        return $value;
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
        //
        $value = Admin_role::selectid($id);
        dump($value);
    }
    /*
     * 权值
     */
    public function Weight(Request $request,$id){
        if ($request->isMethod('post')) {
            $nodeIds = $this->filterId($request->get('node_id',0));
            if(!count($nodeIds)) {
                return $this->error('请勾选节点');
            }
            RoleNode::where('role_id',$id)->forceDelete();
            array_map(function($node_id) use($id) {
                RoleNode::insert(['node_id'=>$node_id,'role_id'=>$id]);
            },$nodeIds);
            LogAction::logAction($id);
            $request->session()->flash('msg',"权值修改成功");
            return redirect()->route('AdminRole.index');
        }else{
        $myNode  = RoleNode::where('role_id',$id)->pluck('node_id')->toArray();
        $nodeIds =  implode(',',$myNode);
        $result = AdminNodes::select('node_id','pid','nodename as name', 'auth')->orderBy('sortid', 'asc')->get()->map(function ($v,$k) use(&$myNode) {
            $v->open = true;
            $v->checked = in_array($v->node_id,$myNode);
                $v->chkDisabled = AdminNodes::isExceptAuth($v->auth);
            return $v;
        })->toJSON();
//        dump($result);die;
        return view('Admin/Administrators/AdminRoleWeight')->with('role_id',$id)->with('nodeIds',$nodeIds)->with('result',$result);
    }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除角色
        $value = Admin_role::where('role_id',$id)->delete();
        if($value){
            return ['msg'=>'删除用户成功','error'=>true];
        }else{
            return ['msg'=>'删除用户成功','error'=>false];
        }
    }
}
