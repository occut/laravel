<?php

namespace App\Http\Controllers\Admin;

use App\ClassLib\Category;
use App\Functions\LogAction;
use App\Model\Admin_role;
use App\Model\AdminNodes;
use App\Model\RoleNode;
use App\Model\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        //查询角色
        if ( !Cache::has('Resultcontent'.Session::get('user')['user_id']) ) {
            $content = Admin_role::Roleselect();
            Cache::forever('Resultcontent'.Session::get('user')['user_id'], $content); //存储
        }
        if ( !Cache::has('ResultRole'.Session::get('user')['user_id']) ) {
            //查询角色
            $role = Admin_role::orderBy('role_id', 'asc');
            $result = $role->get()->toArray();
            $id = UserRole::userroleselect(Session::get('user')['user_id']);
            $rid = Admin_role::selectid($id->role_id);
            //组装成关系数组
            $result = Category::child($result, $rid->pid, 'role_id', 'pid');
            if (Session::get('user')['user_id'] != 1) {
                foreach ($result as $k => $v) {
                    if ($k != $rid->role_id) {
                        unset($result[$k]);
                    }
                }
            }
            Cache::forever('ResultRole'.Session::get('user')['user_id'], $result); //存储
        }
        $result = Cache::get('ResultRole'.Session::get('user')['user_id']); //获取
        $content = Cache::get('Resultcontent'.Session::get('user')['user_id']); //获取
        //赋值到模板
        return view('Admin/Administrators/AdminRoleindex',['content'=>$content])->with('result',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //获取数据
        $data = $this->data();
        if(!empty($data['id'])){
            $content = Admin_role::selectid($data['id']);
        }else{
            $content = '';
        }
        //赋值到模板
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
        //数据处理
        $data = $this->data();
        //添加角色
        $value = Admin_role::Addrole($data);
        Cache::flush();
        //返回数据
        if($value['error']){
            $request->session()->flash('msg',$value['msg']);
            return redirect()->route('AdminRole.index');
        }else{
            $request->session()->flash('msg',$value['msg']);
            return redirect()->route('AdminRole.index');
        }
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
            //获取节点id
            $nodeIds = $this->filterId($request->get('node_id',0));
            if(!count($nodeIds)) {
                return $this->error('请勾选节点');
            }
            //删除节点数据
            RoleNode::where('role_id',$id)->forceDelete();
            Cache::flush();
            //写入权值数据
            array_map(function($node_id) use($id) {
                RoleNode::insert(['node_id'=>$node_id,'role_id'=>$id]);
            },$nodeIds);
            //记录日志
            LogAction::logAction('权值修改成功');
            $request->session()->flash('msg',"权值修改成功");
            //跳转控制器
            return redirect()->route('AdminRole.index');
        }else{
            if ( !Cache::has('ResultMyNode'.Session::get('user')['user_id']) ) {
                //查询当前用户权值
                $myNode = RoleNode::where('role_id', $id)->pluck('node_id')->toArray();
                Cache::forever('ResultMyNode'.Session::get('user')['user_id'], $myNode); //存储
            }
            $myNode = Cache::get('ResultMyNode'.Session::get('user')['user_id']);
            $nodeIds = implode(',', $myNode);
            if ( !Cache::has('ResultMyNodeweit'.Session::get('user')['user_id']) ) {
                //循环遍历数据添加相同数据添加拥有标记
                $result = AdminNodes::select('node_id', 'pid', 'nodename as name', 'auth')->orderBy('sortid', 'asc')->get()->map(function ($v, $k) use (&$myNode) {
                    $v->open = true;
                    $v->checked = in_array($v->node_id, $myNode);
                    $v->chkDisabled = AdminNodes::isExceptAuth($v->auth);
                    return $v;
                })->toJSON();
                Cache::forever('ResultMyNodeweit'.Session::get('user')['user_id'], $result); //存储
            }
            $result = Cache::get('ResultMyNodeweit'.Session::get('user')['user_id']);
        //赋值到模板
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
        //删除关系表
        $v = RoleNode::where('role_id',$id)->delete();
        Cache::flush();
        if($value){
            return ['msg'=>'删除用户成功','error'=>true];
        }else{
            return ['msg'=>'删除用户成功','error'=>false];
        }
    }
}
