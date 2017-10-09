<?php

namespace App\Model;

use App\Functions\LogAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminUser extends Model
{
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
        $user->fid = empty($data['fid']) ?0:$data['fid'];
        $value = $user->save();
        if($value){
            LogAction::logAction("新增用户[".$data['username']."]成功");
            return ['msg'=>"新增用户[".$data['username']."]成功",'error'=>true];
        }else{
            LogAction::logAction("新增用户[".$data['username']."]失败");
            return ['msg'=>"新增用户[".$data['username']."]失败",'error'=>false];
        }
    }
    static public function Adminselect($id){
        //实例化模型
        $user = new AdminUser();
        //查询数据
        $content = $user->where('user_id',$id)->first();
        return $content;
    }

    static public function Rolesselect(){
        //实例化模型
        $role = new Admin_role();
        $content = $role->get();
        return $content;
    }

    static public function updatauser($data){
        $id = $data['user_id'];
        foreach( $data as $k=>$v){
            if( !$v ){
                //bcrypt
                unset( $data[$k] );
            }
            if ($k == 'password'){
                $data['password'] = bcrypt($v);
            }
            unset( $data['user_id'] );
        }
        $value = DB::table('admin_users')
            ->where('user_id',$id)
            ->update($data);
        if($value){
            LogAction::logAction("修改用户[".$data['username']."]成功");
            return ['msg'=>"修改用户[".$data['username']."]成功",'error'=>true];
        }else{
            LogAction::logAction("修改用户[".$data['username']."]失败");
            return ['msg'=>"修改用户[".$data['username']."]失败",'error'=>false];
        }
    }
}
