<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class UserController extends Controller
{
    
    public function all_user()
    {
        //dd('Ok');
        $allusers = DB::table('users')->get();
        //dd($allusers);
        return view('user/alluser',compact('allusers'));
    }

   
    public function create()
    {
        //dd('ok');
        $userrole = DB::table('userroles')->get();
        $branch = DB::table('branchs')->get();
        return view('user/create',compact('userrole','branch'));
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
