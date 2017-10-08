<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminNodes extends Model
{
    protected $table = 'admin_nodes';
    protected $primaryKey = 'node_id';
    const NAV_SHOW = 1;
    const NAV_HIDE = 2;
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
}
