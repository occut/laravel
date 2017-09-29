<?php

namespace App\Http\Middleware;

use App\con_node;
use App\Node;
use App\RoleNode;
use App\User;
use App\UserRole;
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
            return redirect()->route('login.index');
        }
        return $next($request);
    }
}
