<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegionController;

use DB;
use Auth;
use PDF;
use App;

class OrderController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $allCustomer = new CustomerController;
        $allCustomer = $allCustomer->allCustomer();

        $result = DB::table('delivery_orders')
        ->select('delivery_orders.*','zones.id as zid','zones.name as zname','customers.name as cname')
        ->join('zones','zones.id','=','delivery_orders.zoneid')
        ->join('customers','customers.id','=','delivery_orders.custid')
        ->where('delivery_orders.status',0)
        ->orderBy('delivery_orders.id', 'DESC')
        ->get();

        return view('order/orderMaster', compact('result','allCustomer','allZones'));
    }

    public function new()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        return view('order/orderNew', compact('allZones'));
    }


    public function submit(Request $request)
    {
        $exiting = DB::table('delivery_orders')->orderBy('id','DESC')->first();
        if(!empty($exiting))
        {
            $delivery_order_no = "SDO".date('ym').str_pad($exiting->id+1, 4, "0", STR_PAD_LEFT);
        }
        else
        {
            $delivery_order_no = "SDO".date('ym').str_pad(1, 4, "0", STR_PAD_LEFT);;
        }

        DB::table('delivery_orders')->insert([
            'delivery_order_no'          => $delivery_order_no,
            'zoneid'                     => $request->get('zoneid'),
            'regionid'                   => $request->get('regionid'),
            'custid'                     => $request->get('customerid'),
            'do_date'                    => date('Y-m-d',strtotime($request->get('date'))),
            'hybrid_monosex_tilapia_qty' => $request->get('tilapiaQty'),
            'tilapia_complementary_qty'  => $request->get('complementaryQtyTilapia'),
            'hybrid_monosex_pungas_qty'  => $request->get('pungasQty'),
            'pungas_complementary_qty'   => $request->get('complementaryQtyPungas'),
            'pungas_special_qty'         => $request->get('specialPungasQty'),
            'pungas_mortality_qty'       => $request->get('mortalityPungasQty'),
            'tilapia_special_qty'        => $request->get('specialTilaQty'),
            'tilapia_mortality_qty'      => $request->get('mortalityTilaQty'),
            'incentive_tilapia_qty'      => $request->get('incentiveTilaQty'),
            'incentive_tilapia_note'     => $request->get('incentiveTilaNote'),
            'incentive_pungas_qty'       => $request->get('incentivePungasQty'),
            'incentive_pungas_note'      => $request->get('incentivePungasNote'),
            'delivery_charge'            => $request->get('delivery_charge'),
            'userid'                     => Auth::user()->id,
            'created_at'                 => date('Y-m-d H:i:s') // 24 hours
        ]);

        return redirect::to('order')->with('success', 'Ordered Successfully.');
    }


    public function zone_wise_customer(Request $request)
    {
        // dd($request->all());
        $result = DB::table('customers')->where('regionid',$request->get('id'))->get();
        return view('order/customerList', compact('result'));
    }

    public function customer_info(Request $request)
    {
        if($request->get('id')!='')
        {
            $result = DB::table('customers')->where('id',$request->get('id'))->first();
            return $result->address.'~'.$result->delivery_point.'~'.$result->code;
        }
        else
        {
            return '';
        }        
    }

    public function edit($id)
    {
        $edit     = DB::table('delivery_orders')->where('id',$id)->first();
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $allRegions = new RegionController;
        $allRegions = $allRegions->zoneWiseReg($edit->zoneid);

        $allCustomer    = DB::table('customers')->where('regionid', $edit->regionid)->get();
        $singleCustomer = DB::table('customers')->where('id', $edit->custid)->first();

        return view('order/orderEdit', compact('edit','allZones','allCustomer','singleCustomer','allRegions'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        DB::table('delivery_orders')->where('id',$request->get('id'))->update([
            // 'delivery_order_no'          => $delivery_order_no,
            'zoneid'                     => $request->get('zoneid'),
            'regionid'                   => $request->get('regionid'),
            'custid'                     => $request->get('customerid'),
            'do_date'                    => date('Y-m-d',strtotime($request->get('date'))),
            'hybrid_monosex_tilapia_qty' => $request->get('tilapiaQty'),
            'tilapia_complementary_qty'  => $request->get('complementaryQtyTilapia'),
            'hybrid_monosex_pungas_qty'  => $request->get('pungasQty'),
            'pungas_complementary_qty'   => $request->get('complementaryQtyPungas'),
            'pungas_special_qty'         => $request->get('specialPungasQty'),
            'pungas_mortality_qty'       => $request->get('mortalityPungasQty'),
            'tilapia_special_qty'        => $request->get('specialTilaQty'),
            'tilapia_mortality_qty'      => $request->get('mortalityTilaQty'),
            'incentive_tilapia_qty'      => $request->get('incentiveTilaQty'),
            'incentive_tilapia_note'     => $request->get('incentiveTilaNote'),
            'incentive_pungas_qty'       => $request->get('incentivePungasQty'),
            'incentive_pungas_note'      => $request->get('incentivePungasNote'),
            'delivery_charge'            => $request->get('delivery_charge'),
            'userid'                     => Auth::user()->id,
            'updated_at'                 => date('Y-m-d H:i:s') // 24 hours
        ]);

        return redirect::to('order')->with('success', 'Successfully Updated.');
    }

    public function allOrderCount()
    {
        $result = DB::table('delivery_orders')->where('status',0)->count();
        return $result;
    }

    //PDF

    function order_pdf($id) 
    {
        $result = DB::table('delivery_orders')
        ->select('delivery_orders.*','zones.id as zid','zones.name as zname','customers.name as cname','customers.code as ccode','customers.delivery_point','customers.address')
        ->join('zones','zones.id','=','delivery_orders.zoneid')
        ->join('customers','customers.id','=','delivery_orders.custid')
        ->where('delivery_orders.id',$id)
        ->first();       

        return view('order/orderPdf', compact('result'));
        //PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        //$pdf = PDF::loadHTML($this->convert_customer_data_to_html($id)); //('order/orderPdf', compact('result'));
        //return $pdf->download($id.' ('.$id.')'.'.pdf');     


        // $pdf = PDF::loadView('order/orderPdf', compact('result'));
        // return $pdf->download('do.pdf');
    }

    public function convert_customer_data_to_html($id)
    {
        $result = DB::table('delivery_orders')
        ->select('delivery_orders.*','zones.id as zid','zones.name as zname','customers.name as cname','customers.code as ccode','customers.delivery_point','customers.address')
        ->join('zones','zones.id','=','delivery_orders.zoneid')
        ->join('customers','customers.id','=','delivery_orders.custid')
        ->where('delivery_orders.id',$id)
        ->first();

        return view('order/orderPdf', compact('result'));
    }



    ///////////////

    public function updateDo()
    {
        $exiting = DB::table('delivery_orders')->orderBy('id','ASC')->get();

        foreach ($exiting as $value) 
        {
            if($value->id==1)
            {
                $delivery_order_no = "SDO".date('ym',strtotime($value->do_date)).str_pad($value->id, 4, "0", STR_PAD_LEFT);
            }
            else
            {
                $delivery_order_no = "SDO".date('ym',strtotime($value->do_date)).str_pad($value->id, 4, "0", STR_PAD_LEFT);
            }

            DB::table('delivery_orders')->where('id',$value->id)
            ->update([
                'delivery_order_no'  => $delivery_order_no
            ]);
        }

        return 'Successfully Updated'; 
    }

    public function updateInvoice()
    {
        $exiting = DB::table('money_receipts')->orderBy('id','ASC')->get();

        foreach ($exiting as $value) 
        {
            if($value->id==1)
            {
                $serial_no = "AMR".date('ym',strtotime($value->added_date)).str_pad($value->id, 4, "0", STR_PAD_LEFT);
            }
            else
            {
                $serial_no = "AMR".date('ym',strtotime($value->added_date)).str_pad($value->id, 4, "0", STR_PAD_LEFT);
            }

            DB::table('money_receipts')->where('id',$value->id)
            ->update([
                'serial_no'  => $serial_no
            ]);
        }

        return 'Successfully Updated'; 
    }
}
