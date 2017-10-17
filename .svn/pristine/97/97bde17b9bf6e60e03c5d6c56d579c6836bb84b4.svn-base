<?php

namespace App\Http\Controllers\Admin;

use App\ClassLib\Category;
use App\Model\AdminUser;
use App\Model\Promoter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class PromoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pr_id = $request->get('pr_id');
        $pr_name = $request->get('pr_name');
        $pr_state = $request->get('pr_state');
        $Promoter = Promoter::orderBy('pr_id', 'asc');
        if (!is_null($pr_id)) $Promoter->where('pr_id', $pr_id);
        if (!is_null($pr_name))  $Promoter->where('pr_name', $pr_name);
        if ($pr_state != '0' and !is_null($pr_state))  $Promoter->where('pr_state', $pr_state);
        $content = $Promoter->join('promoters_gold', 'pr_id', '=', 'promoters_gold.pr_ids')
            ->paginate(15);
        return view('Admin/Promoter/Promoter')->with('content',$content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = Promoter::orderBy('pr_id', 'asc')->select('pr_id',"pr_name")->get();
        $User = AdminUser::orderBy('user_id','asc');
        $result = $User->get()->toArray();
        $AdminUser =AdminUser::Adminselect(Session::get('user')['user_id']);
        $Roles = Category::child($result,$AdminUser->fid, 'user_id', 'fid');
        if (Session::get('user')['user_id'] != 1) {
            foreach ($Roles as $k => $v) {
                if ($k != $AdminUser->user_id) {
                    unset($Roles[$k]);
                }
            }
        }
        return view('Admin/Promoter/PromoterCreate')->with('res',$Roles);
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
        $data = $this->data();
        $value = Promoter::addpromoter($data);
        Cache::flush();
        if($value['error']){
            $request->session()->flash('msg',$value['msg']);
            return redirect()->route('Promoter.index');
        }else{
            $request->session()->flash('msg',$value['msg']);
            return redirect()->route('Promoter.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        $content = Promoter::account($id);
        $data['pr_state'] = $pr_state = $content->pr_state == 1 ? 0:1;
        $value = DB::table('promoters')
            ->where('pr_id',$id)
            ->update($data);
        Cache::flush();
        if($value){
            $request->session()->flash('msg',"更新状态成功");
            $request->session()->flash('error',true);
            return redirect()->route('Promoter.index');
        }else{
            $request->session()->flash('msg',"更新状态失败");
            $request->session()->flash('error',false);
            return redirect()->route('Promoter.index');
        }
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
//        $res = AdminUser::orderBy('user_id', 'asc')->select('pr_id',"pr_name")->get();
        //查询角色数据
        $User = AdminUser::orderBy('user_id','asc');
        $result = $User->get()->toArray();
//        $AdminUser =AdminUser::Adminselect(Session::get('user')['user_id']);
//        $Roles = Category::child($result,$AdminUser->fid, 'user_id', 'fid');
//        if (Session::get('user')['user_id'] != 1) {
//            foreach ($Roles as $k => $v) {
//                if ($k != $AdminUser->user_id) {
//                    unset($Roles[$k]);
//                }
//            }
//        }
//        dump($Roles);die;

        return view('Admin/Promoter/PromoterEdit')->with('res',$result)->with('content',$content);
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
            return redirect()->route('Promoter.index');
        }else{
            $request->session()->flash('msg',$value['msg']);
            $request->session()->flash('error',false);
            return redirect()->route('Promoter.index');
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
