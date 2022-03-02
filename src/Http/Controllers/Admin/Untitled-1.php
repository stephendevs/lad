<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Controllers\Controller;

use App\Models\Admin\Admin;
use App\Models\Admin\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin-web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = ['id','username','first_name','last_name', 'email', 'status','created_at', 'is_super_admin'];
        $admins = Admin::getAdmins(4, $attributes);
        $roles = Role::all();
        return view('dashboard.admin.index', compact(['admins', 'roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {

        $data = $request->validated();

        

        
        if($saved){
            //on successful creation redirect admin to show details
            return redirect(route('dashboardAdminShow', ['id' => $admin->id]));
        }else{
            return back()
            ->withInput()
            ->with('success', 'Admin created successfully.');
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::with(['roles'])->findOrFail($id);
        $roles = Role::all();
        //dd($admin);
        return view('dashboard.admin.show', compact(['admin'],'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('dashboard.admin.edit', compact(['admin']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'role' => 'required',
        ]);

        $admin = Admin::findOrFail($id);

        $admin->update([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'role' => $request->role
        ]);


        return back()
            ->withInput()
            ->with('success', 'Newz created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return back()->with('success', 'Admin Deleted.');
    }


    /**
     * Activate admin account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        Admin::findOrFail($id)->update([
            'status' => '1'
        ]);

        return back();
    }

    /**
     * Deactivate admin account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        Admin::findOrFail($id)->update([
            'status' => '0'
        ]);

        return back();
    }

}
