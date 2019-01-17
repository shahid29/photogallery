<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $id = Session::get('id');
        if ($id !=NULL){
            return Redirect::to('/dashboard')->send();
        }
    }

    public function index()
    {
        return view('admin.login');
    }

    public function admin_login_check(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $admin_info = DB::table('tbl_admin')
            ->select('*')
            ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();
        if ($admin_info){
            Session::put('id',$admin_info->id);
            Session::put('admin_name',$admin_info->admin_name);
            return Redirect::to('/dashboard');
        }else{
            Session::put('exception','Username or Password Not Match !');
            return Redirect::to('/login');
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
        //
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
