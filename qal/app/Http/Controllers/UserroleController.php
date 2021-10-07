<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;


class UserroleController extends Controller
{
    
    public function userrole()
    {
        //dd('Ok');
         $result = DB::table('userroles')
        ->orderBy('id')
        ->get();
        return view('userrole/userroleMaster', compact('result'));

    }

    
    public function rolename_create(Request $request)
    {
        //dd($request->all());
        DB::table('userroles')->insert(
            [
            'role_name' => $request->get('role_name'),
           
            ]
    );

        return redirect::to('user-role')->with('success', 'Successfully Added.');
    }
    
   
    public function delete($id){

        $delete = DB::table('userroles')
                ->where('id',$id)
                ->delete();
        
        return redirect::to('user-role')->with('success', 'Delete Successfully .');
    }
}
