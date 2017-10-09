<?php

namespace App\Model;

use App\Functions\LogAction;
use Illuminate\Database\Eloquent\Model;

class AdminNodes extends Model
{
    protected $table = 'admin_nodes';
    protected $primaryKey = 'node_id';
    const NAV_SHOW = 2;
    const NAV_HIDE = 1;
    public static function Nodesselect(){
        $roles = DB::table('admin_roles')->get();
        return $roles;
    }
    public static function isExceptAuth($auth){
        $auth       = explode('@', $auth);
        $controller = isset($auth[0]) ? $auth[0] : '';
        $action     = isset($auth[1]) ? $auth[1] : '';

        $exceptAuth = config('rbac.except_auth');
//        return $exceptAuth;
        if(isset($exceptAuth[$controller]) && (empty($exceptAuth[$controller]) || in_array($action, $exceptAuth[$controller]))) {
            return true;
        }
        return false;
    }

    public static function AddNodes($data){
        //实例化模型
        $Nodes = new AdminNodes();
        $Nodes->nodename = $data['nodename'];
        $Nodes->auth = $data['auth'];
        $Nodes->url = $data['url'];
        $Nodes->pid = empty($data['fid']) ?0:$data['fid'];
        $value = $Nodes->save();
        if($value){
            LogAction::logAction("新增节点[".$data['nodename']."]成功");
            return ['msg'=>"新增节点[".$data['nodename']."]成功",'error'=>true];
        }else{
            LogAction::logAction("新增节点[".$data['nodename']."]失败");
            return ['msg'=>"新增节点[".$data['nodename']."]失败",'error'=>false];
        }
    }

    public static function selectNodes($id){
        //实例化模型
        $user = new AdminNodes();
        //查询数据
        $content = $user->where('node_id', $id)->first();
        return $content;
    }
}
