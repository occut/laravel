<?php

namespace App\Http\Controllers\Admin;

use function App\Functions\input;
use App\Functions\LogAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class WebSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = DB::table('site_configuration')
            ->first();
        return view('Admin/Settings/WebSettings')->with('content',$content);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->data();
        $id = $data['id'];
        foreach( $data as $k=>$v){
            if( !$v )
                unset( $data[$k] );
            unset( $data['id'] );
            unset( $data['site'] );
        }
        if(empty($id)){
            $value = DB::table('site_configuration')
            ->insert($data);
        }else{
            $value = DB::table('site_configuration')
            ->where('site_id',$id)
            ->update($data);
        }
        if($value){
            LogAction::logAction("更新站点信息成功".Session::get('user')['username']);
            $request->session()->flash('msg',"更新站点信息成功");
            return redirect()->route('WebSettings.index');
        }else{
            LogAction::logAction("更新站点信息失败".Session::get('user')['username']);
            $request->session()->flash('msg',"更新站点信息失败");
            return redirect()->route('WebSettings.index');
        }
    }
    /*
     * 上传
     */
    public function Webup(Request $request){
        $file = $request->file('file');
        if ($file->isValid()) {
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            // 上传文件
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            // 使用我们新建的uploads本地存储空间（目录）Storage
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            $data = ['site_logo'=>"/public/uploadfiles/".$filename];
            $content = DB::table('site_configuration')
                ->first();
            $path = mb_substr($content->site_logo,1);
            @unlink ($path);
            $value = DB::table('site_configuration')
                ->where('site_id',$content->site_id)
                ->update($data);
            if($value){
                LogAction::logAction("上传图片成功".$filename);
                return ['msg'=>"上传图片成功".$filename."",'error'=>true];
            }else{
                LogAction::logAction("上传图片失败".$filename);
                return ['msg'=>"上传图片失败".$filename."",'error'=>true];
            }

    }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
