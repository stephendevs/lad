<?php

namespace Stephendevs\Lad\Http\Controllers\Cli;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Artisan;

class CliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:'.config('lad.base.auth_guard', 'admin'));
        $this->middleware('permission:cmd');
    }
    public function index()
    {
        return view('lad::cli.index');
    }

    public function run(Request $request)
    {
        $status = Artisan::call(request('command'));

        return response()->json([
            'command' => request('command'),
            'output' => Artisan::output(),
        ], 200);
    }
    
}
