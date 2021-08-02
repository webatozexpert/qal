<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class BranchController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function page_index()
    {
        $result = DB::table('branchs')
        ->select('branchs.*','branch_types.name as bType')
        ->join('branch_types','branchs.branch_type','=','branch_types.id')
        ->where('branchs.status',0)->orderBy('branchs.id')
        ->get();

        $branchType = $this->branchType();

        return view('branch/branchMaster', compact('result','branchType'));
    }

    public function submit(Request $request)
    {
        //dd($request->all());
        DB::table('branchs')->insert([
            'name'        => $request->get('name'),
            'address'     => $request->get('address'),
            'contact_no'  => $request->get('contact_no'),
            'branch_type' => $request->get('branch_type')
        ]);

        return redirect::to('branch-setup')->with('success', 'Successfully Added.');
    }

    public function branch_type_submit(Request $request)
    {
        //dd($request->all());
        DB::table('branch_types')->insert([
            'name'        => $request->get('type_name')
        ]);

        return redirect::back()->with('success', 'Successfully Added.');
    }

    public function edit($id)
    {
        
        $result = DB::table('branchs')
        ->select('branchs.*','branch_types.name as bType')
        ->join('branch_types','branchs.branch_type','=','branch_types.id')
        ->where('branchs.status',0)->orderBy('branchs.id')
        ->get();

        $branchType = $this->branchType();
        $edit = DB::table('branchs')->where('id',$id)->first();

        return view('branch/branchEdit', compact('result','branchType','edit'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        DB::table('branchs')->where('id',$request->get('id'))->update([
            'name'        => $request->get('name'),
            'address'     => $request->get('address'),
            'contact_no'  => $request->get('contact_no'),
            'branch_type' => $request->get('branch_type')
        ]);

        return redirect::to('branch-setup')->with('success', 'Successfully Updated.');
    }


    public function branchType()
    {
        $result = DB::table('branch_types')->where('status',0)->orderBy('id')->get();
        return $result;
    }

    public function allZonesCount()
    {
        $result = DB::table('branchs')->where('status',0)->count();
        return $result;
    }
}
