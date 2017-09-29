<?php

namespace App\Model;

use App\Functions\LogAction;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //
//    use Notifiable;
    const BAN_NO  = 1; //正常
    const BAN_YES = 2; //禁止
    protected $primaryKey = 'user_id';
    static public function AddAdminUser($data){
        //实例化模型
        $user = new AdminUser();
        //查询数据
        $content = $user->where('username', $data['username'])->first();
        if(!empty($content)){
            return ['msg'=>'用户名已存在','error'=>false];
        }
        //添加数据
        $user->username = $data['username'];
        $user->password = bcrypt($data['password']);
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->gender = $data['sex'];
        $user->autograph = $data['autograph'];
        $value = $user->save();
        if($value){
            LogAction::logAction("新增用户[".$data['username']."]成功");
            return ['msg'=>"新增用户[".$data['username']."]",'error'=>true];
        }else{
            LogAction::logAction("新增用户[".$data['username']."]失败");
            return ['msg'=>"新增用户[".$data['username']."]",'error'=>false];
        }
    }
}
