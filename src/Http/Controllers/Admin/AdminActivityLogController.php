<?php

namespace Stephendevs\Lad\Http\Controllers\Admin;

use Stephendevs\Lad\Http\Controllers\Controller;

use Stephendevs\Lad\Models\Activity\ActivityLog;

use Stephendevs\Lad\Models\Admin\Admin;

class AdminActivityLogController extends Controller
{

    public function index($username)
    {
        $admin = Admin::findBy('username', $username)->firstOrFail();
        $activityLog = $admin->activityLog()->paginate(2);
        return view('lad::admins.activitylog.index', compact(['admin', 'activityLog']));

    }
    
   
}
