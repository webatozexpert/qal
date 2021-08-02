<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\CustomerController;
use TNkemdilim\MoneyToWords\Converter;

use DB;
use Auth;
use PDF;

class MoneyReceiptController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = DB::table('money_receipts')
        ->select('money_receipts.*','customers.name as cname','customers.code as ccode','zones.name as zname','banks.name as bname')
        ->join('customers','customers.id','=','money_receipts.custid')
        ->join('zones','zones.id','=','customers.zoneid')
        ->join('banks','banks.id','=','money_receipts.bank_id')
        ->orderBy('money_receipts.id', 'DESC')->get();
        
        return view('mr/mrMaster', compact('result'));
    }

    public function new()
    {
        $allCustomer = new CustomerController;
        $allCustomer = $allCustomer->allCustomer();

        $exiting = DB::table('money_receipts')->orderBy('id','DESC')->first();
        if(!empty($exiting))
        {
            $mrNo = "AMR".date('ym').str_pad($exiting->id+1, 4, "0", STR_PAD_LEFT);
        }
        else
        {
            $mrNo = "AMR".date('ym').str_pad(1, 4, "0", STR_PAD_LEFT);;
        }

        $banks  = DB::table('banks')->orderBy('id')->get();

        return view('mr/mrNew', compact('allCustomer','mrNo','banks'));
    }


    public function submit(Request $request)
    {
        //dd($request->all());
        DB::table('money_receipts')->insert([
            'serial_no'  => $request->get('mrNo'),
            'custid'     => $request->get('customerid'),
            'amount'     => $request->get('amount'),
            'bank_id'    => $request->get('bankid'),
            'note'       => $request->get('note'),
            'added_date' => date('Y-m-d',strtotime($request->get('mrDate'))), // 24 hours
            'created_at' => date('Y-m-d H:i:s'), // 24 hours
            'userid'     => Auth::user()->id
        ]);

        return redirect::to('money-receipt')->with('success', 'Successfully Added.');
    }

    public function edit($id)
    {
        $edit = DB::table('money_receipts')->where('id',$id)->first();

        $allCustomer = new CustomerController;
        $allCustomer = $allCustomer->allCustomer();
        $banks       = DB::table('banks')->orderBy('id')->get();

        return view('mr/mrEdit', compact('edit','allCustomer','banks'));
    }

    public function update(Request $request)
    {
        DB::table('money_receipts')->where('id',$request->get('id'))->update([
            // 'serial_no' => $request->get('mrNo'),
            'custid'     => $request->get('customerid'),
            'amount'     => $request->get('amount'),
            'bank_id'    => $request->get('bankid'),
            'note'       => $request->get('note'),
            'added_date' => date('Y-m-d',strtotime($request->get('mrDate'))), // 24 hours
            'userid'     => Auth::user()->id
        ]);

        return redirect::to('money-receipt')->with('success', 'Successfully Updated.');
    }


    function mr_pdf($id) 
    {
        $result = DB::table('money_receipts')
        ->select('money_receipts.*','customers.name as cname','customers.code as ccode','zones.name as zname','banks.name as bname')
        ->join('customers','customers.id','=','money_receipts.custid')
        ->join('zones','zones.id','=','customers.zoneid')
        ->join('banks','banks.id','=','money_receipts.bank_id')
        ->where('money_receipts.id', $id)->first();

        $converter = new Converter("Taka", "Poisha");
        return view('mr/mrPdf', compact('result','converter'));

        $pdf = PDF::loadHTML($this->convert_customer_data_to_html($id,$converter)); //('order/orderPdf', compact('result'));
        //return $pdf->download($id.' ('.$id.')'.'.pdf');     

        //$pdf = PDF::loadView('mr/mrPdf', compact('result','converter'));
        return $pdf->download('money_receipt.pdf');
    }

    public function convert_customer_data_to_html($id,$converter)
    {
        $result = DB::table('money_receipts')
        ->select('money_receipts.*','customers.name as cname','customers.code as ccode','zones.name as zname','banks.name as bname')
        ->join('customers','customers.id','=','money_receipts.custid')
        ->join('zones','zones.id','=','customers.zoneid')
        ->join('banks','banks.id','=','money_receipts.bank_id')
        ->where('money_receipts.id', $id)->first();

        return view('mr/mrPdf', compact('result','converter'));
    }


    public function allCustomer()
    {
        $result = DB::table('customers')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }

    public function allCustomerCount()
    {
        $result = DB::table('customers')->where('status',0)->count();
        return $result;
    }
}
