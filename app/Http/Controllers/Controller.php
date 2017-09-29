<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function __construct()
    {
        //父类初始化
//        parent::__construct();
        //其他配置加载
        $this->getResourcePath();
    }
    public function getResourcePath()
    {
        View::share('resource', '1');
    }
    /**
     * 获取过滤后的数据
     */
    protected function data($key=null, $def=null)
    {
        static $data = null;
        if(is_null($data)) {
            $data = app('request')->all();
            if(isset($data['_token']))                      unset($data['_token']);
            if(isset($data['_method']))                     unset($data['_method']);
            if(isset($data['file']) && $data['file'] == '') unset($data['file']);
            array_walk($data, function(&$v, $k) {
                if(!is_array($v) && !is_object($v)) {
                    $v = trim($v);
                }
            });
        }
        return $data;
    }
    /**
     * 成功提示
     * 默认跳转到之前的页面
     */
    protected function success($url='',$msg='success')
    {
        if($url == '') {
            return Redirect::back()->withSuccess($msg);
        }else{
            return Redirect::to($url)->withSuccess($msg);
        }
    }
    /**
     * 将逗号分隔的数据过滤成数组
     */
    protected function filterId($id, $callfunction='intval') {
        return array_filter(explode(',', $id), function($var) use(&$callfunction) {
            $var = call_user_func($callfunction, $var);
            return true;
        });
    }
}
