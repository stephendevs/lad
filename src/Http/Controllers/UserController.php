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
