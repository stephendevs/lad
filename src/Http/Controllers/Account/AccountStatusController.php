<?php

namespace Stephendevs\Lad\Http\Controllers\Account;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stephendevs\Lad\Models\Account\Account;

class AccountStatusController extends Controller
{

    public function __construct()
    {
        $this->middleware([
            'auth:'.config('ldashboard.ldashboardadmin_guard', 'ldashboardadmin')
        ]);
    }
    /**
     * Display admin account info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ldashboard::account.status.accountBlockedAlert');
    }

    
}
