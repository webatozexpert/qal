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
                  ->orderBy('id','desc')
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
            'password'  => 'required|confirmed|min:6',
            'user_role' => 'required',
        ]);

      $user_last_id =  DB::table('users')->insertGetId([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'type'      => $request->get('type'),
            'user_role' => $request->get('user_role'),
            'status'    => $request->get('status'),
            'user_group'=> $request->get('user_group'),
            'password'  => Hash::make($request->get('password')),
        ]);      

        foreach($request->get('branch_id') as $branchid)
        {
            DB::table('branch_permissions')->insert([
                'user_id'       => $user_last_id,
                'branch_id'     => $branchid
            ]);
        } 

       
       // $totalBranch = count($request->get('branch_id'));
       // for ($i=0; $i <= $totalBranch; $i++) 
       // { 
       //      DB::table('branch_permissions')->insert([
       //          'user_id'       => $user_last_id,
       //          'branch_id'     => $request->get('branch_id')[$i]
       //          // 'branch_default'=> $request->get('branch_default')[$i]
       //      ]);
       // }

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
            'user_role' => 'required',
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

        DB::table('branch_permissions')->where('user_id',$request->get('id'))
        ->delete();

        foreach($request->get('branch_id') as $branchid)
        {
            DB::table('branch_permissions')->insert([
                'user_id'       => $request->get('id'),
                'branch_id'     => $branchid
            ]);
        } 

        // $totalBranch = count($request->get('branch_id'));
        // for ($i=1; $i <= $totalBranch; $i++) 
        // { 
        //     DB::table('branch_permissions')->where('id',$request->get('id'))->insert([
        //         'user_id'       => $request->get('id'),
        //         'branch_id'     => $request->get('branch_id')[$i]
        //     ]);
        // }

        return redirect::to('all-user')->with('success', 'Successfully Updated.');
    }

     public function delete($id){

        $delete = DB::table('users')
                ->where('id',$id)
                ->delete();
        
        return redirect::to('all-user')->with('success', 'Delete Successfully .');
    }
}
