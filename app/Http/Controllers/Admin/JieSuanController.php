<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use App\Model\Promoter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class JieSuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收数据
        $pr_id = $request->get('pr_id');
        $pr_name = $request->get('pr_name');
        $pr_state = $request->get('pr_state');
        //查询数据
        $Promoter = Promoter::orderBy('pr_id', 'asc');
        if (!is_null($pr_id)) $Promoter->where('pr_id', $pr_id);
        if (!is_null($pr_name)) $Promoter->where('pr_name', $pr_name);
        if ($pr_state != '0' and !is_null($pr_state))  $Promoter->where('pr_state', $pr_state);
        $content = $Promoter->join('promoters_gold', 'pr_id', '=', 'promoters_gold.pr_ids')
            ->paginate(15);
        //赋值到模板
        return view('Admin/JieSuan/JieSuan')->with('content',$content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/JieSuan/JieSuanDate');
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
        $content = Promoter::account($id);
        //查询角色数据
        $User = AdminUser::orderBy('user_id','asc');
        $result = $User->get()->toArray();
        return view('Admin/JieSuan/JieSuanEdit')->with('res',$result)->with('content',$content);

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
        $data = $this->data();
        $value = Promoter::updatedpromoter($id,$data);
        Cache::flush();
        if($value['error']){
            $request->session()->flash('msg',$value['msg']);
            $request->session()->flash('error',true);
            return redirect()->route('JieSuan.index');
        }else{
            $request->session()->flash('msg',$value['msg']);
            $request->session()->flash('error',false);
            return redirect()->route('JieSuan.index');
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
        if($id != 'all'){
            $value = Promoter::where('pr_id',$id)->delete();
            DB::table('promoters_gold')->where('pr_ids',$id)->delete();
        }else{
            $value = Promoter::whereIn('pr_id',$data['id'])->delete();
            DB::table('promoters_gold')->whereIn('pr_ids',$data['id'])->delete();
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
