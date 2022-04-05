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


    public function run(Request $request)
    {
        $optionsArrKeys = $optionsArrValues = $optionsArr = [];

        $request->validate([
            'command' => 'required'
        ]);

        $command = $request->command;

        if($request->options){
            $options = $request->options;
            $broken = explode(',', $options);

            for($i = 0; $i < count($broken); $i++){
                $keyvalues = explode('=', $broken[$i]);
                $optionsArrKeys[$i] = $keyvalues[0];
                $optionsArrValues[$i] = $keyvalues[1];
            }
            $optionsArr = array_combine($optionsArrKeys, $optionsArrValues);
            $status = Artisan::call($command, $optionsArr);
        }else{
            $status = Artisan::call($command);
        }

        return back()->withInput()->with('success', Artisan::output());
    }

    public function runCommon( $command)
    {
        $status = Artisan::call($command);
        return back()->with('success', Artisan::output());
    }


}
