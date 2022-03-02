<?php

namespace Stephendevs\Lad\Http\Controllers\Mailer;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MailTemplatesController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth:'.config('lad.base.auth_guard', 'admin')
        ]);
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        return view('lad::mailer.templates.index');
    }

    
}
