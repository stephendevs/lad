<?php

namespace Stephendevs\Lad\Http\Controllers\Account;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stephendevs\Lad\Models\Account\Account;


class AccountNotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:'.config('ldashboard.ldashboardadmin_guard', 'ldashboardadmin'));
    }
    /**
     * Display admin account info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('ldashboard::account.notification.index');
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
    
}
