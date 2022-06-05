<?php

namespace Stephendevs\Lad\Http\Controllers\Account;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class AccountController extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display admin account info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = auth()->user();
        return (request()->expectsJson()) ? response()->json(['account' => $account]) : view('lad::account.index', compact(['account']));
    }

    public function activityLog()
    {
        $account = auth()->user();
        $activitylog = $account->activitylog()->paginate(4);
        return (request()->expectsJson()) ? response()->json(['account' => $account, 'activitylog' => $activitylog]) :  view('lad::account.activitylog.index', compact(['account', 'activitylog']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showStatus()
    {
        return view('lad::account.status');
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'password' => 'required|min:6,max:12|confirmed',
        ]);

        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        return ($request->expectsJson()) ? response()->json(['message' => 'Password changed successfully']) : back()->withInput()->with('updated', 'Password changed successfully');
    }
    
}
