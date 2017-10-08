<?php

namespace App\Http\Middleware;


use App\Model\AdminNodes;
use App\Model\RoleNode;
use App\Model\UserRole;
use Closure;
use Route;
use Illuminate\Support\Facades\Session;

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
            return redirect()->route('login');
        }
//        if(Session::get('user')['user_id'] !== 1){
            if(self::hasAuth(Session::get('user')['user_id']) === false) {
//                return redirect()->route('error');
                echo "权限不足";
              die;
            }
//        }

        return $next($request);
    }
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
