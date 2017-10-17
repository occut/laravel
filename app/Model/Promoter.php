<?php

namespace App\Model;

use App\Functions\LogAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Translation\Tests\Writer\BackupDumper;

class Promoter extends Model
{
    protected $table = 'Promoters';
    protected $primaryKey = 'pr_id';
    const BAN_NO  = 1; //正常
    const BAN_YES = 2; //禁止
    public static function account($id)
    {
        $promoter = new Promoter();
        $value = $promoter->where('pr_id', $id)->first();
        return $value;
    }
    public static function addpromoter($data){
        $promoter = new Promoter();
        $value = $promoter->where('pr_name', $data['pr_name'])->first();
        if(!empty($value)){
            return ['msg'=>'用户名已存在','error'=>false];
        }
        //添加数据
        $insertId = $promoter::insertGetId($data);
        DB::table('promoters_gold')->insert([
            ['pr_ids' => $insertId, 'pr_gold' => 0]
        ]);
        if($insertId){
            LogAction::logAction("新增推广员[".$data['pr_name']."]成功");
            return ['msg'=>"新增推广员[".$data['pr_name']."]成功",'error'=>true];
        }else{
            LogAction::logAction("新增推广员[".$data['pr_name']."]失败");
            return ['msg'=>"新增推广员[".$data['pr_name']."]失败",'error'=>false];
        }
    }

    public static function updatedpromoter($id,$data){
        foreach( $data as $k=>$v){
            if( $v =='' ){
                unset( $data[$k] );
            }
            if ($k == 'pr_password' and $v != ''){
                $data['pr_password'] = bcrypt($v);
            }
        }
//dump($data);die;
        $value = DB::table('promoters')
            ->where('pr_id',$id)
            ->update($data);
//        dump($value);die;
        if($value){
            LogAction::logAction("修改用户[".$data['pr_name']."]成功");
            return ['msg'=>"修改用户[".$data['pr_name']."]成功",'error'=>true];
        }else{
            LogAction::logAction("修改用户[".$data['pr_name']."]失败");
            return ['msg'=>"修改用户[".$data['pr_name']."]失败",'error'=>false];
        }
    }

    public static function types($id){
        if($id == '0') return "PC";
        if($id == '1') return "安卓";
        if($id == '2') return "IOS";
    }
}
