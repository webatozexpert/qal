<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class ZoneController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = DB::table('zones')->where('status',0)->orderBy('id')->get();
        return view('zone/zoneMaster', compact('result'));
    }

    public function zone_submit(Request $request)
    {
        //dd($request->all());
        DB::table('zones')->insert([
            'code' => $request->get('zoneCode'),
            'name' => $request->get('zoneName')
        ]);

        return redirect::to('zone-setup')->with('success', 'Successfully Added.');
    }

    public function zone_edit($id)
    {
        $edit = DB::table('zones')->where('id',$id)->first();
        $result = DB::table('zones')->where('status',0)->orderBy('id', 'DESC')->get();

        return view('zone/zoneEdit', compact('result','edit'));
    }

    public function zone_update(Request $request)
    {
        //dd($request->all());
        DB::table('zones')->where('id',$request->get('id'))->update([
            'code' => $request->get('zoneCode'),
            'name' => $request->get('zoneName')
        ]);

        return redirect::to('zone-setup')->with('success', 'Successfully Updated.');
    }


    public function allZones()
    {
        $result = DB::table('zones')->where('status',0)->orderBy('code')->get();
        return $result;
    }

    public function allZonesCount()
    {
        $result = DB::table('zones')->where('status',0)->count();
        return $result;
    }
}
