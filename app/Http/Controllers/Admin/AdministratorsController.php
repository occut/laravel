<?php

namespace App\Http\Controllers\Admin;

use App\Functions\LogAction;
use App\Model\Admin_role;
use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $username = $request->get('username','');
        $ban = $request->get('ban',0);
        $User = AdminUser::orderBy('created_at','desc');
        if($username) {
            $User->where('username',$username);
        }
        if($ban) {
            $User->where('ban',$ban);
        }
        $content = $User->paginate(30);
        $Admin_role = Admin_role::Roleselect();
        //显示表单
        return view('Admin/Administrators/index',['content'=>$content,'Admin_role'=>$Admin_role]);
    }
    /**
     * 权值
     */
    public function weight(Request $request,$id){
        $user_id = $request->get('id');
        $content = Admin_role::Roleselect();
        return view('Admin/Administrators/Administratorsweight',["user_id"=>$user_id,'content'=>$content]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加用户
        return view('Admin/Administrators/create');
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
        //添加用户
        $value = AdminUser::AddAdminUser($data);
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
