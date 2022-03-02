<?php

namespace Stephendevs\Lad\Http\Middleware\Permission;

use Closure;
use Stephendevs\Lad\Models\Permission\Permission as AdminPermission;

use Stephendevs\Lad\Models\Admin\Admin;


class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission_key, $guard = null)
    {
        if ($user = auth($guard)->user()) {
            $permissions = [];
            $admin = Admin::with('permissions')->find(auth($guard)->user()->user_id);
            foreach ($admin->permissions as $permission) {
                array_push($permissions, $permission->permission->permission);
            }

            if(in_array($permission_key, $permissions)){
                return $next($request);
            }else{
                abort(403);
            }
        }

        abort(403);
        
    }
}
