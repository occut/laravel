<?php

namespace App\Model;

use App\Http\Controllers\Admin\ActivityController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActivityModel extends Model
{
    protected $table = 'activity_lists';
//    添加活动
    static public function addActivity($data){
        //实例化模型
        $ActivityModel=new ActivityModel();
        //查询数据
        $ActivityModel->act_type=$data['activity_types'];
        $ActivityModel->act_name=$data['activity_name'];
        $ActivityModel->status=$data['status'];
        $ActivityModel->start_time=$data['start_time'];
        $ActivityModel->end_time=$data['end_time'];
        $ActivityModel->act_num=$data['joinNum'];
        $ActivityModel->act_prize=$data['activity_prize'];
        $value = $ActivityModel->save();
        if($value){
//            LogAction::logAction("添加活动[".$data['username']."]成功");
            return ['msg'=>"添加活动成功",'error'=>true];
        }else{
//            LogAction::logAction("添加活动[".$data['username']."]失败");
            return ['msg'=>"添加活动失败",'error'=>false];
        }
    }

    static public function updateActivity($data){
        $id=$data['act_id'];
        foreach ($data as $k=>$v){
            if(!$v){
                if ($k != 'status'){
                    unset( $data[$k] );
                }
        }
                unset( $data['act_id'] );
        }
        $result = DB::table('activity_lists')
            ->where('act_id',$id)
            ->update($data);
        if($result){
//            LogAction::logAction("修改成功");
            return ['msg'=>"修改成功",'error'=>true];
        }else{
//            LogAction::logAction("修改失败");
            return ['msg'=>"修改失败",'error'=>false];
        }
    }
}
