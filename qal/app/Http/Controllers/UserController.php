<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use DB;

class UserController extends Controller
{
    public function all_user()
    {
        //dd('Ok');
       
        $allusers = DB::table('users')
                ->select('users.*','userroles.id as uid','userroles.role_name')
                ->leftJoin('userroles','userroles.id','=','users.user_role')
                ->get();

        //dd($userrole);
        return view('user/alluser',compact('allusers'));
    }

    public function create()
    {
        //dd('ok');
        $userrole = DB::table('userroles')->get();
        $branch   = DB::table('branchs')->get();
        return view('user/create',compact('userrole','branch'));
    }

    public function store(Request $request)
    {
       //dd('OK');
       // dd($request->all());
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|confirmed|min:6'
        ]);

        DB::table('users')->insert([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'type'      => $request->get('type'),
            'user_role' => $request->get('user_role'),
            'status'    => $request->get('status'),
            'user_group'=> $request->get('user_group'),
            'password'  => Hash::make($request->get('password')),
        ]);

       return redirect::to('all-user')->with('success', 'Successfully Added.');
    }

    public function edit($id)

    {
        $edit = DB::table('users')->where('id',$id)->first();

        $userrole = DB::table('userroles')->get();
        $branch   = DB::table('branchs')->get();
        return view('user/edit',compact('edit','userrole','branch'));
    }
 
    public function update(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required|min:6'
        ]);

        DB::table('users')->where('id',$request->get('id'))->update([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'type'      => $request->get('type'),
            'user_role' => $request->get('user_role'),
            'status'    => $request->get('status'),
            'user_group'=> $request->get('user_group')
        ]);

        if($request->get('password')!='')
        {
            DB::table('users')->where('id',$request->get('id'))->update([            
                'password'  => Hash::make($request->get('password'))
            ]);
        }

        return redirect::to('all-user')->with('success', 'Successfully Added.');
    }

     public function delete($id){

        $delete = DB::table('users')
                ->where('id',$id)
                ->delete();
        
        return redirect::to('all-user')->with('success', 'Delete Successfully .');
    }
}
