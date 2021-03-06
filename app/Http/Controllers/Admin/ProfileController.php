<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( !Cache::has('ResultAdminUsercontent') ) {
            //查询当前用户数据
            $content = AdminUser::Adminselect(Session::get('user')['user_id']);
            Cache::forever('ResultAdminUsercontent', $content); //存储
        }
        $content = Cache::get('ResultAdminUsercontent'); //获取
        //赋值到模板
        return view('Admin/Settings/Profile')->with('content',$content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //处理数据
        $data = $this->data();
        //更新数据
        $value = AdminUser::updatauser($data);
        Cache::forget('ResultAdminUsercontent'); //获取
        //返回数据
        if($value['error']){
            $request->session()->flash('msg',$value['msg']);
            return redirect()->route('Profile.index');
        }else{
            $request->session()->flash('msg',$value['msg']);
            return redirect()->route('Profile.index');
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
