<?php
namespace Stephendevs\Lad\Http\Controllers\Mailer;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ContactFormController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth:'.config('lad.base.auth_guard', 'admin')
        ]);
    }
    /**
     * Show contact form
     */
   
    public function index()
    {
        return view('lad::mailer.contact.index');
    }

    public function send()
    {
        return 'hello';
    }

    
}
