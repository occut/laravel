<?php

namespace App\Http\Controllers\Admin;

use App\ClassLib\Category;
use App\Functions\LogAction;
use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收数据
        $ac_name = $request->get('ac_name');
        $ac_ip = $request->get('ac_ip');
        $ac_type = $request->get('ac_type');
        $ac_adminuser = $request->get('ac_adminuser');
        $ac_promoters = $request->get('ac_promoters');
        $startTime = $request->get('startTime');
        $endTime = $request->get('endTime');
        //  查询数据
        $register = DB::table('account_register')->orderBy('ac_id', 'asc');
        if (!is_null($ac_name)) $register->where('ac_name', 'like', "%$ac_name%");
        if (!is_null($ac_ip)) $register->where('ac_ip', 'like', "%$ac_ip%");
        if (!is_null($ac_type)) $register->where('ac_type', $ac_type);
        if (!is_null($ac_adminuser)) $register->where('ac_adminuser', $ac_adminuser);
        if (!is_null($ac_promoters))  $register->where('ac_promoters', $ac_promoters);
        if (!is_null($startTime) and !is_null($endTime)) $register->whereBetween('ac_time', [$startTime,$endTime]);
        $content = $register->paginate(15);

        //查询管理员
        $User = AdminUser::orderBy('user_id','asc');
        $result = $User->get()->toArray();
        $AdminUser =AdminUser::Adminselect(Session::get('user')['user_id']);
        $User = Category::child($result,$AdminUser->fid, 'user_id', 'fid');
        if (Session::get('user')['user_id'] != 1) {
            foreach ($User as $k => $v) {
                if ($k != $AdminUser->user_id) unset($User[$k]);
            }
        }
        //查询渠道
        $promoters = DB::table('promoters')->orderBy('pr_id','asc')->select('pr_id','pr_name')->get();
        return view('Admin/Register/Register')->with('content',$content)->with('User',$User)->with('promoters',$promoters);
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
        //
        $content = DB::table('account_register')->where('ac_id', $id)->first();
        return view('Admin/Register/RegisterEdit')->with('content',$content);
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
        //修改数据
        $data = $this->data();
        $value = DB::table('account_register')
            ->where('ac_id',$id)
            ->update($data);
        //返回数据
        if($value){
            //记录日志
            LogAction::logAction("注册数据[".$id."]成功");
            //返回消息
            $request->session()->flash('msg',"注册数据[".$id."]成功");
            $request->session()->flash('error',true);
            //跳转路由
            return redirect()->route('Register.index');
        }else{
            LogAction::logAction("注册数据[".$id."]失败");
            $request->session()->flash('msg',"注册数据[".$id."]失败");
            $request->session()->flash('error',false);
            return redirect()->route('Register.index');
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
        $data = $this->data();
        //执行软删除
        if($id != 'all')$value = DB::table('account_register')->where('ac_id',$id)->delete();
        else $value = DB::table('account_register')->whereIn('ac_id',$data['id'])->delete();
        //删除关系表
        Cache::flush();
        if($value){
            LogAction::logAction("删除注册数据[".$id."]成功");
            return ['msg'=>'删除用户成功','error'=>true];
        }else{
            LogAction::logAction("删除注册数据[".$id."]失败");
            return ['msg'=>'删除用户失败','error'=>false];
        }

    }
}
