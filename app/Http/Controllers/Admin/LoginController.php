<?php

namespace App\Http\Controllers\Admin;

use App\Functions\LogAction;
use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function decodeUnicode($str)
    {
        return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
            create_function(
                '$matches',
                'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
            ),
            $str);
    }
    public function index()
    {
        //判断是否登陆过
        if (Session::get('user')){
            return redirect()->route('index.index');
        }
        //赋值模板
        return view('Admin/Login/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //退出登陆
        LogAction::logAction('退出登录');
        $request->session()->flush();
        return redirect()->route('login.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        //
        //获取数据
        $username = $request->input('username');
        $password = $request->input('password');
        $captcha = $request->input('captcha');
        //实例化模型
        $user = new AdminUser();
        //判断验证码
        //查询数据
        $content = $user->where('username',$username)->first();
        if (is_null($content)) {
            return ['msg'=>'账号或密码错误'];
        }
        if (!Hash::check($password,$content->password)){
            return ['msg'=>'账号或密码错误','error'=>false];
        }
        //储存session
        $request->session()->put('user', ['username'=>$content->username,'user_id'=>$content->user_id]);
        //记录日志
        LogAction::logAction('登录'.$username.'成功');
        //登陆成功跳转提示
        return ['msg'=>'登录成功，正在跳转！！！！','error'=>true,'url'=>'/Admin/index'];
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
    public function destroy(Request $request,$id)
    {

    }
}
