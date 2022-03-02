<?php

namespace Stephendevs\Lad\Http\Controllers\Admin;

use Stephendevs\Lad\Http\Controllers\Controller;
use Stephendevs\Lad\Http\Requests\AdminQuickCreateRequest;
use Stephendevs\Lad\Models\Admin\Admin;

use Illuminate\Support\Str;

class AdminQuickCreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminQuickCreateRequest $request)
    {
        $data = $request->validated();

        //Creating new admin
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        //saving admin to the db
        $saved = $admin->save();

        if($saved){
            //send email notification to user
            if($request->has('alert')){
                //return $admin;
            }
            //on successful creation redirect to show created admin details
            //return redirect(route('ldashboardAdminShow', ['id' => $admin->id]));
            return back();
            
        }else{
            return back()
            ->withInput()
            ->with('success', 'Admin created successfully.');
        }
    }
}
