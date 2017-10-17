<?php

namespace App\Http\Middleware;


use App\ClassLib\Category;
use App\Model\Admin_role;
use App\Model\AdminNodes;
use App\Model\RoleNode;
use App\Model\UserRole;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($request->session()->get('user'))){
            return redirect()->route('login.index');
        }
        $auth = Route::current()->getActionName();
//        dump($auth);
//        if(Session::get('user')['user_id'] !== 1){
            if(self::hasAuth(Session::get('user')['user_id']) === false) {
                return redirect()->route('Error');
            }
//        }
        $this->getResourcePath();
        return $next($request);
    }

    public function getResourcePath()
    {
        //获取用户ID
        $adminid = Session::get('user')['user_id'];
        if ( !Cache::has('Resultparent'.Session::get('user')['user_id']) ) {
            $Node = AdminNodes::orderBy('sortid', 'asc');
            //查询角色权限
            $userroles = UserRole::where('user_id', $adminid)->get()->toArray();
            $a = RoleNode::where('role_id', $userroles[0]['role_id'])->get()->toArray();
            $node_id = [];
            foreach ($a as $vo) {
                $node_id[] = $vo['node_id'];
            }
            //导航显示数据
            $result = $Node->where(['nav' => 1])->whereIn('node_id', $node_id)->get()->toArray();
            $parent = Category::child($result, 0, 'node_id', 'pid');
            Cache::forever('Resultparent'.Session::get('user')['user_id'], $parent); //存储
        }
        $ia = UserRole::userroleselect($adminid);
        $id = Admin_role::selectid($ia->role_id);
        $adminnamerole = [
            'name'=>Session::get('user')['username'],
            'rolename'=>$id->rolename,
        ];
        $parent = Cache::get('Resultparent'.Session::get('user')['user_id']); //获取
        View::share('parent',$parent);
        View::share('adminnamerole',$adminnamerole);
    }
    //查询当期访问是否有权限
    protected static function hasAuth($user_id)
    {
        $auth = Route::current()->getActionName();
        if(AdminNodes::isExceptAuth($auth)) return true;
        $nodeID = AdminNodes::where('auth', $auth)->pluck('node_id')->toArray();
//        if(is_null($nodeID)) return false;
        if(empty($nodeID)) return false;
        $nodeRoleIds = RoleNode::where('node_id',$nodeID)->pluck('role_id');
        if($nodeRoleIds->count() == 0) return false;
        $userRoleIds = UserRole::where('user_id',$user_id)->pluck('role_id');
        if($userRoleIds->count() == 0) return false;
        $intersect = $nodeRoleIds->intersect($userRoleIds);
        if($intersect->count()) {
            return true;
        }
        return false;
    }
}
