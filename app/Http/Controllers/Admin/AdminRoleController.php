<?php

namespace App\Http\Controllers\Admin;

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
        return view('Admin/Administrators/AdminRoleindex',['content'=>$content]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Administrators/AdminRolecreate');
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
        return $value;
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
        $myNode  = RoleNode::where('role_id',$id)->pluck('node_id')->toArray();
        $nodeIds =  implode(',',$myNode);
        $result = AdminNodes::select('node_id','pid','nodename as name', 'auth')->orderBy('sortid', 'asc')->get()->map(function ($v,$k) use(&$myNode) {
            $v->open = true;
            $v->checked = in_array($v->node_id,$myNode);
//                $v->chkDisabled = RbacNode::isExceptAuth($v->auth);
            return $v;
        })->toJSON();
        dump($result);
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
        //
    }
}
