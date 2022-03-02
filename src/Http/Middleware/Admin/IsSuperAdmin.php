<?php

namespace Stephendevs\Lad\Http\Middleware\Admin;

use Closure;
use Stephendevs\Lad\Models\Permission\AdminPermission;


class IsSuperAdmin
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
        $id = auth(config('lad.base.auth_guard', 'admin'))->user()->id;
        $permission = AdminPermission::findPermission('super_admin', $id)->first();

        if ($permission && $permission->permission_value == true) {
            return $next($request);
        } else {
            return redirect(route('lad.dashboard'));
        }
    }
}
