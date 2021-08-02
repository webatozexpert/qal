<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegionController;
use TNkemdilim\MoneyToWords\Converter;

use DB;
use Auth;
use PDF;
use App;
use Validator;

class FactoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    ///////////////////// Gate Pass ///////////////////

    public function gate_pass()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $allCustomer = new CustomerController;
        $allCustomer = $allCustomer->allCustomer();

        $result = DB::table('gate_pass')
        ->select('gate_pass.*','customers.name as cname','customers.code','customers.mobile','customers.address')
        ->join('customers','customers.id','=','gate_pass.agentid')
        ->where('gate_pass.status',0)
        ->orderBy('gate_pass.id', 'DESC')
        ->get();

        return view('factory/gatePass/gatePassMaster', compact('result','allCustomer','allZones'));
    }

    public function gate_pass_new()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        return view('factory/gatePass/gatePassNew', compact('allZones'));
    }


    public function gate_pass_submit(Request $request)
    {
        $exiting = DB::table('gate_pass')->orderBy('id','DESC')->first();
        if(!empty($exiting))
        {
            $no = "SGP".date('ym').str_pad($exiting->id+1, 4, "0", STR_PAD_LEFT);
        }
        else
        {
            $no = "SGP".date('ym').str_pad(1, 4, "0", STR_PAD_LEFT);;
        }

        DB::table('gate_pass')->insert([
            'gp_no'                      => $no,
            'doid'                       => 'SDO'.$request->get('doid'),
            'agentid'                    => $request->get('agentid'),
            'date'                       => date('Y-m-d',strtotime($request->get('date'))),
            'following_item'             => $request->get('followingQty'),
            'particulars_items'          => $request->get('ParticularsItems'),
            'items_qty'                  => $request->get('quantity'),
            'userid'                     => Auth::user()->id
        ]);

        return redirect::to('factory/gate-pass')->with('success', 'Gate pass successfully created.');
    }

    function gate_pass_pdf($type,$id) 
    {
        $result = DB::table('gate_pass')
        ->select('gate_pass.*','customers.name as cname','customers.code','customers.mobile','customers.address','customers.delivery_point')
        ->join('customers','customers.id','=','gate_pass.agentid')
        ->where('gate_pass.status',0)
        ->where('gate_pass.id',$id)
        ->first();

        return view('factory/gatePass/gatePassPdf', compact('result','type'));
    }



    /////////////////////// CHALLAN //////////////////////


    public function challan()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $allCustomer = new CustomerController;
        $allCustomer = $allCustomer->allCustomer();

        $result = DB::table('challans')
        ->select('challans.*','delivery_orders.delivery_order_no as doid','zones.id as zid','zones.name as zname','customers.name as cname')
        ->join('delivery_orders','delivery_orders.delivery_order_no','=','challans.do_id')
        ->join('zones','zones.id','=','delivery_orders.zoneid')
        ->join('customers','customers.id','=','delivery_orders.custid')
        ->orderBy('challans.id', 'DESC')
        ->get();

        return view('factory/challan/challanMaster', compact('result','allCustomer','allZones'));
    }

    public function challan_new()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        return view('factory/challan/challanNew', compact('allZones'));
    }


    public function challan_submit(Request $request)
    {    
		$rules = [
		  'do_id' => 'required|unique:challans'
		];

		$messages = [
		  'required'  => 'The Delivery Order No field is required.',
		  'unique'    => 'Delivery Order No is already used'
		];

		$request->validate($rules,$messages);

        $exiting = DB::table('challans')->orderBy('id','DESC')->first();
        if(!empty($exiting))
        {
            $no = "SDC".date('ym').str_pad($exiting->id+1, 4, "0", STR_PAD_LEFT);
        }
        else
        {
            $no = "SDC".date('ym').str_pad(1, 4, "0", STR_PAD_LEFT);;
        }

        DB::table('challans')->insert([
            'challan_no'           => $no,
            'do_id'                => 'SDO'.$request->get('do_id'),
            'tilapia_per_box'      => $request->get('pcs1'),
            'tilapia_no_box'       => $request->get('box1'),
            'tilapia_comp_per_box' => $request->get('pcstilapiaQtyCompl1'),
            'tilapia_comp_no_box'  => $request->get('boxtilapiaQtyCompl1'),
            'pungas_per_box'       => $request->get('pcsPungas1'),
            'pungas_no_box'        => $request->get('boxPungas1'),
            'pungas_comp_per_box'  => $request->get('pcspungasQtyCompl1'),
            'pungas_comp_no_box'   => $request->get('boxpungasQtyCompl1'),
            'date'                 => date('Y-m-d',strtotime($request->get('date'))),
            'userid'               => Auth::user()->id
        ]);

        return redirect::to('/factory/challan')->with('success', 'Challan Successfully.');
    }


    public function challan_pdf($type,$id) 
    {
        $result = DB::table('challans')
        ->select('challans.*','delivery_orders.delivery_order_no as doid','delivery_orders.do_date','delivery_orders.hybrid_monosex_tilapia_qty','delivery_orders.tilapia_complementary_qty','delivery_orders.hybrid_monosex_pungas_qty','delivery_orders.pungas_complementary_qty','zones.id as zid','zones.name as zname','customers.name as cname','customers.code as ccode','customers.delivery_point','customers.address')
        ->join('delivery_orders','delivery_orders.delivery_order_no','=','challans.do_id')
        ->join('zones','zones.id','=','delivery_orders.zoneid')
        ->join('customers','customers.id','=','delivery_orders.custid')
        ->where('challans.id', $id)
        ->first();

        return view('factory/challan/challanPdf', compact('result','type'));
    }


    
    /////////////////////// INVOICE //////////////////////


    public function invoice()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $allCustomer = new CustomerController;
        $allCustomer = $allCustomer->allCustomer();

        $result = DB::table('invoices')
        ->select('invoices.*','delivery_orders.delivery_order_no as doid','zones.id as zid','zones.name as zname','customers.name as cname','challans.challan_no')

        ->join('challans','challans.challan_no','=','invoices.challan_id')
        ->join('delivery_orders','delivery_orders.delivery_order_no','=','challans.do_id')
        ->join('zones','zones.id','=','delivery_orders.zoneid')
        ->join('customers','customers.id','=','delivery_orders.custid')
        ->orderBy('invoices.id', 'DESC')
        ->get();

        return view('factory/invoice/invoiceMaster', compact('result','allCustomer','allZones'));
    }

    public function invoice_new()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        return view('factory/invoice/invoiceNew', compact('allZones'));
    }

    public function invoice_submit(Request $request)
    {
        $rules = [
          'challan_id' => 'required|unique:invoices'
        ];

        $messages = [
          'required'  => 'The Challan No field is required.',
          'unique'    => 'Challan No is already used'
        ];

        $request->validate($rules,$messages);

        $exiting = DB::table('challans')->orderBy('id','DESC')->first();
        if(!empty($exiting))
        {
            $no = "BIL".date('ym').str_pad($exiting->id+1, 4, "0", STR_PAD_LEFT);
        }
        else
        {
            $no = "BIL".date('ym').str_pad(1, 4, "0", STR_PAD_LEFT);;
        }

        DB::table('invoices')->insert([
            'invoice_no'  => $no,
            'challan_id'  => 'SDC'.$request->get('challan_id'),
            'date'        => date('Y-m-d',strtotime($request->get('date'))),
            'created_at'  => date('Y-m-d H:i:s'), // 24 hours
            'userid'      => Auth::user()->id
        ]);

        return redirect::to('/factory/invoice')->with('success', 'Invoice Successfully.');
    }


    public function invoice_pdf($type,$id) 
    {
        $result = DB::table('invoices')
        ->select('invoices.*','delivery_orders.delivery_order_no as doid','delivery_orders.delivery_charge','delivery_orders.do_date','delivery_orders.hybrid_monosex_tilapia_qty','delivery_orders.tilapia_complementary_qty','delivery_orders.hybrid_monosex_pungas_qty','delivery_orders.pungas_complementary_qty','zones.id as zid','zones.name as zname','customers.name as cname','customers.code as ccode','customers.delivery_point','customers.address','customers.carriage_charge','challans.challan_no')
        
        ->join('challans','challans.challan_no','=','invoices.challan_id')
        ->join('delivery_orders','delivery_orders.delivery_order_no','=','challans.do_id')
        ->join('zones','zones.id','=','delivery_orders.zoneid')
        ->join('customers','customers.id','=','delivery_orders.custid')
        ->where('invoices.id', $id)
        ->first();

        $converter = new Converter("Taka", "Poisha");

        return view('factory/invoice/invoicePdf', compact('result','type','converter'));
    }

    //////////////////

    public function customer_info(Request $request)
    {
        if($request->get('id')!='')
        {
        	$code = 'QALA'.$request->get('id');
            $result = DB::table('customers')->where('code',$code)->first();
            return $result->address.'~'.$result->delivery_point.'~'.$result->name.'~'.'0'.$result->mobile.'~'.$result->code;
        }
        else
        {
            return '';
        }        
    }

    public function do_info(Request $request)
    {
        if(strlen($request->get('id'))==8)
        {
        	$code   = 'SDO'.$request->get('id');

            $result = DB::table('delivery_orders')
	        ->select('delivery_orders.*','zones.name as zname','regions.name as rname','customers.name as cname','customers.id as cid','customers.address','customers.delivery_point','customers.mobile','customers.code')
	        ->join('zones','zones.id','=','delivery_orders.zoneid')
	        ->join('regions','regions.zoneid','=','zones.id')
	        ->join('customers','customers.id','=','delivery_orders.custid')
	        ->where('delivery_orders.status',0)
	        ->where('delivery_orders.delivery_order_no',$code)
	        ->first();

	        //dd($result);

            return $result->zname.'~'.$result->rname.'~'.$result->cname.' ('.$result->code.') '.'~'.$result->address.'~'.$result->delivery_point.'~'.'0'.$result->mobile.'~'.$result->code.'~'.$result->hybrid_monosex_tilapia_qty.'~'.$result->tilapia_complementary_qty.'~'.$result->hybrid_monosex_pungas_qty.'~'.$result->pungas_complementary_qty.'~'.$result->cid;
        }
        else
        {
            return '';
        }        
    }

    public function invoice_info(Request $request)
    {
        if(strlen($request->get('id'))==8)
        {
            $code   = 'SDC'.$request->get('id');

            $result = DB::table('challans')
            ->select('challans.*','zones.name as zname','regions.name as rname','customers.name as cname','customers.address','customers.delivery_point','customers.mobile','customers.code')

            ->join('delivery_orders','delivery_orders.delivery_order_no','=','challans.do_id')
            ->join('zones','zones.id','=','delivery_orders.zoneid')            
            ->join('regions','regions.zoneid','=','zones.id')
            ->join('customers','customers.id','=','delivery_orders.custid')
            ->where('challans.challan_no',$code)
            ->first();

            return $result->zname.'~'.$result->rname.'~'.$result->cname.' ('.$result->code.') '.'~'.$result->address.'~'.$result->delivery_point.'~'.$result->mobile.'~'.$result->code;
        }
        else
        {
            return '';
        }        
    }



    ////////////////// Dashboard /////////////////

    public function allGetPassCount()
    {
        $result = DB::table('gate_pass')
        ->select('gate_pass.*','customers.name as cname','customers.code','customers.mobile','customers.address')
        ->join('customers','customers.id','=','gate_pass.agentid')
        ->where('gate_pass.status',0)
        ->orderBy('gate_pass.id', 'DESC')
        ->count();

        return $result;
    }

    public function allChallanCount()
    {
        $result = DB::table('challans')
        ->select('challans.*','delivery_orders.id as doid','zones.id as zid','zones.name as zname','customers.name as cname')
        ->join('delivery_orders','delivery_orders.id','=','challans.do_id')
        ->join('zones','zones.id','=','delivery_orders.zoneid')
        ->join('customers','customers.id','=','delivery_orders.custid')
        ->orderBy('challans.id', 'DESC')
        ->count();

        return $result;
    }

    public function allInvoiceCount()
    {
        $result = DB::table('invoices')
        ->select('invoices.*','delivery_orders.id as doid','zones.id as zid','zones.name as zname','customers.name as cname')

        ->join('challans','challans.id','=','invoices.challan_id')
        ->join('delivery_orders','delivery_orders.id','=','challans.do_id')
        ->join('zones','zones.id','=','delivery_orders.zoneid')
        ->join('customers','customers.id','=','delivery_orders.custid')
        ->orderBy('invoices.id', 'DESC')
        ->count();

        return $result;
    }
}
