<?php

namespace Stephendevs\Lad\Http\Controllers\Artisan;

use Stephendevs\Lad\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


class ArtisanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('lad::artisans.index');
    }


    public function run($command)
    {
        $status = Artisan::call($command);
        return back()->with('message', Artisan::output());
    }

}
