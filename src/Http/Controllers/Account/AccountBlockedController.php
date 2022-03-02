<?php

namespace Stephendevs\Lad\Http\Controllers\Account;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stephendevs\Lad\Models\Admin\Admin;

class AccountBlockedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:'.config('ldashboard.ldashboardadmin_guard', 'ldashboardadmin'));
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $blockedAccount = Admin::with([
            'blockDetail:id,admin_id,blocked,block_message,is_message_html,blocked_by'
        ])->getBlockedAdminById(auth('lDbdadmin')->user()->id);
        return view('dashboard.account.blocked', compact(['blockedAccount']));
    }
}
