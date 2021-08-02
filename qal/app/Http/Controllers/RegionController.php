<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ZoneController;

use DB;

class RegionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = DB::table('regions')->select('regions.*','zones.name as zname')->
        join('zones','regions.zoneid','=','zones.id')
        ->where('regions.status',0)->orderBy('id')->get();

        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        return view('region/regionMaster', compact('result','allZones'));
    }

    public function region_submit(Request $request)
    {
        //dd($request->all());
        DB::table('regions')->insert([
            'zoneid' => $request->get('zoneId'),
            'name'   => $request->get('regionName')
        ]);

        return redirect::to('region-setup')->with('success', 'Successfully Added.');
    }

    public function region_edit($id)
    {
        $edit = DB::table('regions')->where('id',$id)->first();

        $result = DB::table('regions')->select('regions.*','zones.name as zname')->
        join('zones','regions.zoneid','=','zones.id')
        ->where('regions.status',0)->orderBy('id', 'DESC')->get();

        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        return view('region/regionEdit', compact('allZones','edit','result'));
    }

    public function region_update(Request $request)
    {
        //dd($request->all());
        DB::table('regions')->where('id',$request->get('id'))->update([
            'zoneid' => $request->get('zoneId'),
            'name'   => $request->get('regionName')
        ]);

        return redirect::to('region-setup')->with('success', 'Successfully Updated.');
    }


    public function allRegion()
    {
        $result = DB::table('regions')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }

    public function zoneWiseReg($id)
    {
        $result = DB::table('regions')->where('status',0)->where('zoneid',$id)
        ->orderBy('id', 'DESC')->get();

        return $result;
    }

    public function zoneWiseRegions(Request $request)
    {
        $result = DB::table('regions')->where('status',0)->where('zoneid',$request->get('zoneid'))
        ->orderBy('id', 'DESC')->get();

        return view('region/zoneWiseRegions', compact('result'));
    }

    public function allRegionCount()
    {
        $result = DB::table('regions')->where('status',0)->count();
        return $result;
    }
}
