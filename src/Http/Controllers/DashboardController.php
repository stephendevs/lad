<?php

namespace Stephendevs\Lad\Http\Controllers;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use Stephendevs\Lad\Models\Admin\Admin;


class DashboardController extends Controller
{
    public function __construct()
    {
       $this->middleware(['usertype:admin']);
    }

    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        return view(config('lad.home', 'lad::index'));
    }
}
