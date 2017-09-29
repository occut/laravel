<?php

namespace App\Model;

use App\Functions\LogAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin_role extends Model
{
    //
    protected $primaryKey = 'role_id';

    public static function Addrole($data){
        //实例化模型
        $user = new Admin_role();
        //查询数据
        $content = $user->where('rolename', $data['rolename'])->first();
        if(!empty($content)){
            return ['msg'=>'角色名已存在','error'=>false];
        }
        //添加数据
        $user->rolename = $data['rolename'];
        $value = $user->save();
        if($value){
            LogAction::logAction("新增角色[".$data['rolename']."]成功");
            return ['msg'=>"新增角色[".$data['rolename']."]",'error'=>true];
        }else{
            LogAction::logAction("新增角色[".$data['rolename']."]失败");
            return ['msg'=>"新增角色[".$data['rolename']."]",'error'=>false];
        }
    }
    public static function Roleselect(){
        $roles = DB::table('admin_roles')->get();
        return $roles;
    }
}