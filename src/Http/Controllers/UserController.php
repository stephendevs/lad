<?php

namespace Stephendevs\Lad\Http\Controllers;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('lad::users.index', compact(['users']));
    }
    
}
