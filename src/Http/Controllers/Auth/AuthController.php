<?php

namespace Stephendevs\Lad\Http\Controllers\Auth;


use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class AuthController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | Auth Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating admins to the applications dashboard and
    | redirecting them to login screen if not logged in.
    |
    */

    public function __construct()
    {
        /**
        * Where to redirect users after login.
        * @var string
        */
        $this->redirectTo = config('lad.route_prefix', '/dashboard');
        $this->middleware('guest')->except(['logout','resetPassword','resetPwd']);
    }


    public function index()
    {
        return view('lad::auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password
        ], $request->get('remember'))){
            return redirect()->intended(config('lad.route_prefix', '/dashboard'));
        }
        
        return back()
        ->withInput($request->only('email','remember'))
        ->with('failed', true)
        ->with('message', 'Invalid Credentials.');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('lad.login')->with('success', 'You have successfully Logged Out.');
    }

    public function resetPassword()
    {
        return view('phoebi::auth.resetpassword');
    }

    public function resetPwd(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $find = User::where('email', $request->email)->get(['email']);


        if(count($find) == 1){
            $email = $find[0]->email;
            return view('lad::auth.resetpasswordcode', compact(['email']));
        }else{
            return back()->withInput()->with('failed', true)->with('message', 'Invalid Email Address');
        }

    }



}
