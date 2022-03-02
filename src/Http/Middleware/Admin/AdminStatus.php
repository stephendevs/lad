<?php

namespace Stephendevs\Lad\Http\Middleware\Admin;

use Closure;

class AdminStatus
{
    /**
     * Handle an incoming request.
     * 
     * Check if admin status (blocked or not)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth(config('ldashboard.ldashboardadmin_guard', 'ldashboard'))->user()->is_blocked) {
            return $next($request);
        } else {
            return redirect(route('ldashboardAccountBlockedAlert'));
        }
    }
}
