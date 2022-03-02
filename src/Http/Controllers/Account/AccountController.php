<?php

namespace Stephendevs\Lad\Http\Controllers\Account;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stephendevs\Lad\Models\Admin\Admin;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware([
            'auth','usertype:admin'
        ]);
    }
    /**
     * Display admin account info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = Admin::with(['user'])->findOrFail(auth()->user()->user_id);
        return view('lad::account.index', compact(['account']));
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
        return back()->withInput()->with('updated', 'Password changed successfully');
    }
    
}
