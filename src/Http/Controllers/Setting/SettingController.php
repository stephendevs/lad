<?php

namespace Stephendevs\Lad\Http\Controllers\Setting;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Stephendevs\Lad\Traits\UpdatesOrCreatesOptions;


class SettingController extends Controller
{
    use UpdatesOrCreatesOptions { 
        updateOrCreate as store;
     }

    public function __construct()
    {

    }
   
    public function index()
    {
        $options =  $this->getOptions();
        return view('lad::settings.index', compact(['options']));
    }

    protected function options() : array 
    {
        return [
            'dashboard_logo' => ['lad/img/logo.png'],
        ];
    }

    protected function rules()
    {
        return [
            'dashboard_logo' => 'nullable',
        ];
    }
}
