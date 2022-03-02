<?php

namespace Stephendevs\Lad\Http\Controllers\Dashboard;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DashboardSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth:'.config('lad.base.auth_guard', 'admin'),
            'permission:configure_system_settings'
        ]);
    }
   
    public function index(Request $request)
    {
        return view('lad::settings.index');
    }
}
