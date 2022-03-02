<?php

namespace Stephendevs\Lad\Http\Controllers\Admin;

use Stephendevs\Lad\Http\Controllers\Controller;


use Illuminate\Http\Request;

use Stephendevs\Lad\Models\Admin\Admin;

class AdminStatusController extends Controller
{
    /**
     * Display a listing of the blocked admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'show a listing of blocked admins';
    }


    /**
     * Display the specified blocked Admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show specific blocked admin';
    }

    /**
     * Block a specific admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->is_blocked = '1';
        $admin->save();

        if($request->has('notify')){
            //alert admin that his/her account has been blocked
            $admin->sendAdminStatusNotification(1);
        }
        return back()->with('success', $admin->username.' Account has been blocked');
    }


     /**
     * Unblock a specific admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unblock(Request $request, $id)
    {

        $admin = Admin::findOrFail($id);
        $admin->is_blocked = '0';
        $admin->save();

        if($request->has('notify')){
            //alert admin that his/her account has been blocked
            $admin->sendAdminStatusNotification(0);
        }
        return back()->with('success', $admin->username.' Account has been unblocked');
    }

}
