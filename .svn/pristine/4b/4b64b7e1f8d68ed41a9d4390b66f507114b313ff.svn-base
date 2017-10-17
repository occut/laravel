<?php

namespace App\Model;

use App\Functions\LogAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    protected $table = 'account_management';
    protected $primaryKey = 'account_id';
    //
    public static function Accountselect($id){
        //实例化模型
        $Account = new Account();
        //查询数据
        $content = $Account->where('account_id', $id)->first();
        return $content;
    }
    public static function updataccount($data,$id){
        $value = DB::table('account_management')
            ->where('account_id',$id)
            ->update($data);
        if($value){
            LogAction::logAction("修改账户[".$data['account_name']."]成功");
            return ['msg'=>"修改账户[".$data['account_name']."]成功",'error'=>true];
        }else{
            LogAction::logAction("修改账户[".$data['account_name']."]失败");
            return ['msg'=>"修改账户[".$data['account_name']."]失败",'error'=>false];
        }
    }
}
