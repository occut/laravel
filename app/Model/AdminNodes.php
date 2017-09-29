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
}
