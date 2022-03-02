<?php

namespace Stephendevs\Lad\Http\Controllers\Admin;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;



use Stephendevs\Lad\Models\Admin\Admin;
use Stephendevs\Lad\Models\Permission\Permission;


class AdminPermissionController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username, $id)
    {
        $permissions = [];

        $admin = Admin::with('permissions')->find(auth()->user()->user_id);
        foreach ($admin->permissions as $permission) {
            array_push($permissions, $permission->permission->permission);
        }

        $admin = Admin::with(['permissions'])->findOrFail($id);
        $permissions = Permission::all();
        return  view('lad::admins.permissions.index', compact(['admin', 'permissions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $admin = Admin::find($id);

        if($request->has('permission') && $request->has('save')){
            if(count($request->permission)){
                for ($i=0; $i < count($request->permission); $i++){
                    $admin->permissions()->create([
                        'permission_id' => $request->permission[$i],
                    ]);
                }
            }
        }else{
            if($request->has('permission') && $request->has('update')){
                if(count($request->permission)){
                    $admin->permissions()->where('model_id', $id)->delete();
                    for ($i=0; $i < count($request->permission); $i++){
                        $admin->permissions()->create([
                            'permission_id' => $request->permission[$i],
                        ]);
                    }
                }
            }
        }

        return back()->withInput()->with('updated', 'Admin Permissions updated successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAdminRequest $request, $id)
    {
        
    }

    /**
     * Completelt remove the specified admin from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

    }



   

}
