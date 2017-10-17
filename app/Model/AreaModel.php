<?php

namespace App\Model;

use App\Functions\LogAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AreaModel extends Model
{
    protected $table = 'area_lists';

    static public function getArea($id){
        //实例化模型
        $Area = new AreaModel();
        //查询数据
        $content = $Area->where('area_id', $id)->first();
        return $content;
    }
//    添加活动
    static public function addArea($data){
        //实例化模型
        $AreaModel=new AreaModel();
        //查询数据
//        DB::table('game_lists')->get();
        $AreaModel->game_name=$data['game_name'];
        $AreaModel->area_name=$data['area_name'];
        $AreaModel->area_num=$data['area_num'];
        $AreaModel->recommend=$data['recommend'];
        $AreaModel->phone=$data['phone'];
        $AreaModel->showOrnot=$data['showOrnot'];
        $AreaModel->stop=$data['stop'];
        $AreaModel->time=$data['time'];
        $value = $AreaModel->save();
        if($value){
            LogAction::logAction("添加区服[".$data['area_name']."]成功");
            return ['msg'=>"添加区服成功",'error'=>true];
        }else{
            LogAction::logAction("添加区服[".$data['area_name']."]失败");
            return ['msg'=>"添加区服失败",'error'=>false];
        }
    }

    static public function updateArea($data)
    {
        $id = $data['area_id'];
        foreach ($data as $k => $v) {
            if (!$v) {
                unset($data['area_id']);
            }
            $result =DB::table('area_lists')
                ->where('area_id', $id)
                ->update($data);
            if ($result) {
                LogAction::logAction("修改区服[".$data['area_name']."]成功");
                return ['msg' => "修改区服成功", 'error' => true];
            } else {
                LogAction::logAction("修改区服[".$data['area_name']."]失败");
                return ['msg' => "修改区服失败", 'error' => false];
            }
        }
    }
}
