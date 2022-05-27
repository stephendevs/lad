<?php

namespace Stephendevs\Lad\Http\Controllers;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;



class UserController extends Controller
{

    public function __construct()
    {
    }

    /**
     * List all the users -- paginate 4
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['roles'])->paginate(4);
        return view('lad::users.index', compact(['users']));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20|min:3|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6,max:12|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        return ($request->expectsJson()) ? response()->json(['hello']) : back()->withInput();
    }
    /**
     * Delete user from the storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User:;destroy($id);
        return (request()->expectsJson()) ? response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ], 200) : back()->with('deleted', 'User Deleted successfully.');
    }

}
