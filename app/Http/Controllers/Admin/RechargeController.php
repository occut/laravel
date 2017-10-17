<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Method;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收数据
        $re_account = $request->get('re_account');
        $re_order = $request->get('re_order');
        $re_channel = $request->get('re_channel');
        $re_type = $request->get('re_type');
        $re_service = $request->get('re_service');
        $re_state = $request->get('re_state');
        $re_mode = $request->get('re_mode');
        $startTime = $request->get('startTime');
        $endTime = $request->get('endTime');
        //查询数据
        $recharge = DB::table('account_recharge')->orderBy('re_id', 'asc');
        if (!is_null($re_account))  $recharge->where('re_account', 'like', "%$re_account%");
        if (!is_null($re_order))  $recharge->where('re_account', 'like', "%$re_order%");
        if (!is_null($re_channel))  $recharge->where('re_channel', $re_channel);
        if (!is_null($re_type))  $recharge->where('re_type', $re_type);
//        if (!is_null($re_service))  $recharge->where('re_service', $re_service);
        if (!is_null($re_state))  $recharge->where('re_state', $re_state);
        if (!is_null($re_mode))  $recharge->where('re_mode', $re_mode);
        if (!is_null($startTime) and !is_null($endTime)) $recharge->whereBetween('re_time', [$startTime,$endTime]);
        $content = $recharge->paginate(15);
        //查询渠道
        $promoters = DB::table('promoters')->orderBy('pr_id','asc')->select('pr_id','pr_name')->get();
        //赋值模板
//        Method::mm();
        return view('Admin/Recharge/Recharge')->with('promoters',$promoters)->with('content',$content);
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
        $data = $this->data();
//        dump($data);die;
        //执行软删除
        if($id != 'all'){
            $value = DB::table('account_recharge')->where('re_id',$id)->delete();
        }else{
            $value =  DB::table('account_recharge')->whereIn('re_id',$data['id'])->delete();
        }
        //删除关系表
        Cache::flush();
        if($value){
            return ['msg'=>'删除用户成功','error'=>true];
        }else{
            return ['msg'=>'删除用户失败','error'=>false];
        }

    }
}
