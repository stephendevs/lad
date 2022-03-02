<?php

namespace Stephendevs\Lad\Http\Controllers\Admin;

use Stephendevs\Lad\Http\Controllers\Controller;
use Stephendevs\Lad\Http\Requests\AdminRequest;
use Stephendevs\Lad\Http\Requests\EditAdminRequest;
use Illuminate\Http\Request;

use Stephendevs\Lad\Models\Permission\AdminPermission;



use Stephendevs\Lad\Models\Admin\Admin;

use Stephendevs\Lad\Models\Activity\ActivityLog;
use Illuminate\Support\Str;



class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with(['user']
        )->where('id', '!=', auth()->user()->user_id)
        ->orderBY('created_at', 'desc')->paginate(10);

        return (request()->expectsJson()) ? response()->json($admins) : view('lad::admins.index', compact(['admins']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //get default passwords for admin creattion --> FS

        return view('lad::admins.create');
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

        //Creating new admin
        $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;

        //saving admin to the db
        $saved = $admin->save();

        $admin->user()->create([
            'name' => $request->username,
            'email' => $request->email,
            'password' =>  bcrypt($request->password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        return (request()->expectsJson()) ? response()->json(['message' => 'Admin created successfully']) : back()->withInput()->with('created', 'Admin Created successfully');
    }

    /**
     * Display the specified Admin.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username, $id)
    {
        $admin = Admin::with(['user'])->where('id', $id)->firstOrFail();
        return (request()->expectsJson()) ? response()->json($admin) : view('lad::admins.show', compact(['admin']));
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username, $id)
    {
        $admin = Admin::with('user')->findOrFail($id);
        return (request()->expectsJson()) ? response()->json($admin) : view('lad::admins.edit', compact(['admin']));
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
        $data = $request->validated();

        $admin = Admin::with('user')->findOrFail($id);
        
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->save();

        $admin->user()->update([
            'name' => $request->username,
            'email' => $request->email
        ]);

        return ($request->expectsJson()) ? response()->json($admin) : back()->withInput()->with('updated', 'Admin Edited successfully.');
    }

    /**
     * Completelt remove the specified admin from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        
        return (request()->expectsJson()) ? response()->json([
            'success' => true,
            'message' => 'Admin deleted successfully'
        ], 200) : back()->with('deleted', 'Admin Deleted successfully.');

    }

    public function table()
    {
        $paginated = true;
        $admins = Admin::where('id', '!=', Auth(config('lad.base.auth_guard', 'admin'))->user()->id)->orderBY('created_at', 'desc')->getAdmins(true, 4);
        return view('lad::core.includes.tables.listAdminsTable', compact(['admins']));
    }


    public function changePassword(Request $request, $id)
    {
        $data = $request->validate([
            'password' => 'required|min:6,max:12|confirmed',
        ]);
        $admin = Admin::with('user')->find($id);
        $admin->user()->update([
            'password' => bcrypt($request->password)
        ]);
        return (request()->expectsJson()) ? response()->json(['message' => 'Updated']) : back()->withInput()->with('updated', 'Password updated successfully');
    }

}
