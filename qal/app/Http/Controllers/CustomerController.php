<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\RegionController;

use DB;
use Auth;

class CustomerController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $result = DB::table('customers')
        ->select('customers.*','zones.id as zid','zones.name as zname','regions.name as rname')
        ->join('zones','zones.id','=','customers.zoneid')
        ->join('regions','regions.id','=','customers.regionid')
        ->where('customers.status',0)
        ->orderBy('customers.id')->get();
        
        return view('customer/customerMaster', compact('result','allZones'));
    }

    public function new()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $exiting  = DB::table('customers')->orderBy('id', 'DESC')->first();
        if(!empty($exiting))
        {
            $agentCode = $exiting->id +1;
        }
        else
        {
            $agentCode = 1;
        }

        return view('customer/customerNew', compact('allZones','agentCode'));
    }


    public function submit(Request $request)
    {
        //dd($request->all());
        DB::table('customers')->insert([
            'regionid' => $request->get('regionid'),
            'zoneid' => $request->get('zoneid'),
            'code' => $request->get('customerCode'),
            'name' => $request->get('customerName'),
            'proprietor' => $request->get('proprietorName'),
            'address' => $request->get('customerAddress'),
            'mobile' => $request->get('customerMobile'),
            'delivery_point' => $request->get('deliveryPoint'),
            'carriage_charge' => $request->get('CarriageCharge'),
            'userid' => Auth::user()->id
        ]);

        return redirect::to('agent-setup')->with('success', 'Successfully Added.');
    }

    public function edit($id)
    {
        $edit = DB::table('customers')->where('id',$id)->first();
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $allRegions = new RegionController;
        $allRegions = $allRegions->zoneWiseReg($edit->zoneid);

        return view('customer/customerEdit', compact('edit','allZones','allRegions'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        DB::table('customers')->where('id',$request->get('id'))->update([
            'regionid' => $request->get('regionid'),
            'zoneid' => $request->get('zoneid'),
            'code' => $request->get('customerCode'),
            'name' => $request->get('customerName'),
            'proprietor' => $request->get('proprietorName'),
            'address' => $request->get('customerAddress'),
            'mobile' => $request->get('customerMobile'),
            'delivery_point' => $request->get('deliveryPoint'),
            'carriage_charge' => $request->get('CarriageCharge'),
            'userid' => Auth::user()->id
        ]);

        return redirect::to('agent-setup')->with('success', 'Successfully Updated.');
    }


    public function allCustomer()
    {
        $result = DB::table('customers')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }

    public function singleCustomer($agentid)
    {
        $result = DB::table('customers')->where('id',$agentid)->orderBy('id', 'DESC')->get();
        return $result;
    }

    public function allCustomerCount()
    {
        $result = DB::table('customers')->where('status',0)->count();
        return $result;
    }
}
