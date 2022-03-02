<?php

namespace Stephendevs\Lad\Http\Middleware\UserType;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $usertype, $guard = null)
    {
        if ($user = auth($guard)->user()) {
            $userableTypeNamespace = explode('\\', $user->user_type);

            if (end($userableTypeNamespace) === Str::studly($usertype)) {
                return $next($request);
            }else{
                //redirect the user to log out page
                Auth::logout();
                return redirect()->route('lad.login');
            }
        }
        
        if($usertype == 'admin'){
            return redirect()->route('lad.login');
        }
        abort(403);


    }
}
