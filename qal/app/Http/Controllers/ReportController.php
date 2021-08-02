<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExcelExportController;
use App\Exports\DeliveryOrderExport;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;
use Auth;
use PDF;
use App;
use Excel;

class ReportController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function delivery_report()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $allCustomer = new CustomerController;
        $allCustomer = $allCustomer->allCustomer();


        $customer = DB::table('customers')
        ->where('status',0)->orderBy('id', 'DESC')->get();

        return view('report/reportMaster', compact('allCustomer'));
    }


    public function daily_statement_report_pdf(Request $request)
    {
        $fromDate = date('Y-m-d', strtotime($request->get('fromDate')));
        $toDate   = date('Y-m-d', strtotime($request->get('toDate')));
        $agentid  = $request->get('agentid');
        
        $reports = DB::table('delivery_orders')
            ->select('delivery_orders.*','zones.id as zid','zones.name as zname','customers.name as cname','customers.carriage_charge','customers.delivery_point','customers.id as cid')
            ->join('zones','zones.id','=','delivery_orders.zoneid')
            ->join('customers','customers.id','=','delivery_orders.custid')
            ->whereBetween('delivery_orders.do_date', [$fromDate, $toDate])
            // ->where('delivery_orders.custid', $allCustomers->id)
            ->get();

        $pdf = PDF::loadView('report/dailyStatementPdf', compact('reports','fromDate','toDate'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('Ledger.pdf');
    }

    public function delivery_report_pdf(Request $request)
    {
        $fromDate = date('Y-m-d', strtotime($request->get('fromDate')));
        $toDate   = date('Y-m-d', strtotime($request->get('toDate')));
        $agentid  = $request->get('agentid');
        
        $allCustomer = new CustomerController;
        if($agentid!='')
        {
            $allCustomer = $allCustomer->singleCustomer($agentid);
        }
        else
        {
            $allCustomer = $allCustomer->allCustomer();
        }        

        // return view('report/doReportPdf', compact('fromDate','toDate','allCustomer'));

        $pdf = PDF::loadView('report/dailyStatementPdf', compact('fromDate','toDate','allCustomer'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('Ledger.pdf');
    }


    public function delivery_report_excel(Request $request)
    {
        $fromDate    = date('Y-m-d', strtotime($request->get('fromDate')));
        $toDate      = date('Y-m-d', strtotime($request->get('toDate')));
        $agentid     = $request->get('agentid');
        $reportType  = $request->get('reportType'); // daily, monthly/yearly

        if($reportType=='Daily')
        {
            $sheetName  = 'daily_statement';
            $sheetName1 = 'Daily Statement';
        }
        elseif($reportType=='Yearly')
        {
            $sheetName  = 'yearly_statement';
            $sheetName1 = 'Yearly Statement';
        }

        $reports = DB::table('delivery_orders')
                    ->select('delivery_orders.*','zones.id as zid','zones.name as zname','customers.name as cname','customers.carriage_charge','customers.delivery_point','customers.id as cid')
                    ->join('zones','zones.id','=','delivery_orders.zoneid')
                    ->join('customers','customers.id','=','delivery_orders.custid')
                    ->whereBetween('delivery_orders.do_date', [$fromDate, $toDate])
                    // ->where('delivery_orders.custid', $allCustomers->id)
                    ->get()->toArray();

        $custom_array[] = array('SL','Name of Party','District','Qty','Compensation 5%','Mortality',
            'Incentive-19','Total (Qty)','MR NO','DO No','Bank/Cash','FRY Grade','FRY Comission Less',
            'FRY actulal Price','Total Amount','Carriage','Total Carriage.TK.','Net value','Received',
            'Total  Balance','Delivery Point');

        $s = 1;
        foreach ($reports as $data) 
        {
            $qty          = $data->hybrid_monosex_tilapia_qty + $data->hybrid_monosex_pungas_qty;
            $compensation = $data->tilapia_complementary_qty + $data->pungas_complementary_qty;
            $mortality    = $data->pungas_mortality_qty + $data->tilapia_mortality_qty;


            $mrInfo = DB::table('money_receipts')
                    ->select('money_receipts.*','banks.name as bname')
                    ->join('banks','banks.id','=','money_receipts.bank_id')
                    ->whereBetween('money_receipts.added_date', [$data->do_date, $data->do_date])
                    ->where('money_receipts.custid', $data->cid)
                    ->get();

                $mrNo=0;
                $bank='';
                foreach ($mrInfo as $value) {
                    $mrNo .= $value->id.' | ';
                    $bank .= $value->bname.' | ';
                }

            $chargeRate    = 0;
            $totalCarriage = 0;

            if($data->delivery_charge=='Yes')
            {
                $chargeRate    = $data->carriage_charge;
                $totalCarriage = $chargeRate * $qty;
            }

            $totalAmount =  $qty * '1.20';
            $finalAmount =  $totalAmount - $totalCarriage;

            $custom_array[] = array(
                'SL'              => $s,
                'Name of Party'   => $data->cname,
                'District'        => $data->zname,
                'Qty'             => $qty,
                'Compensation 5%' => $compensation,
                'Mortality'       => $mortality,
                'Incentive-19'    => '',
                'Total (Qty)'     => $qty + $compensation +$mortality,
                'MR NO'           => $mrNo,
                'DO No'           => $data->id,
                'Bank/Cash'       => $bank,
                'FRY Grade'       => '1.30',
                'FRY Comission Less' => '0.10',
                'FRY actulal Price' => '1.20',
                'Total Amount'    =>$totalAmount,
                'Carriage'        => $chargeRate,
                'Total Carriage.TK.' => $totalCarriage,
                'Net value'       => $finalAmount,
                'Received'        => $finalAmount,
                'Total  Balance'  => '',
                'Delivery Point'  => $data->delivery_point
            ); 

            $s++;
        }

        Excel::create('daily_statement',function($excel) use ($custom_array) {
            $excel->sheet('Daily Statement',function($sheet) use ($custom_array){
                $sheet->fromArray($custom_array,null,'A1', false,false);
            });
        })->download('xlsx');
    }
}
