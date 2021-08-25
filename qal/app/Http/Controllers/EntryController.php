<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use PDF;
class EntryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = DB::table('zones')->where('status',0)->orderBy('id')->get();
        return view('entry/entryMaster', compact('result'));
    }

    public function order_entry_submit(Request $request)
    {
        $exiting = DB::table('order_query_history')->where('customer_id',$request->get('customerID'))->count();

        if($exiting >0)
        {
            $customerType = "Old";
        }
        else
        {
            $customerType = "New";
        }

        DB::table('order_query_history')->insert(
            [
                'type'          => 'Order',
                'customer_id'   => $request->get('customerID'),
                'lead'          => $request->get('lead'),
                'customer_type' => $customerType,
                'added_date'    => date('Y-m-d'),
                'created_at'    => date('Y-m-d H:i:s') // 24 hours
            ]
        );

        $this->orderSummaryDayWise($request->get('lead'));

        return 0;
    }

    public function query_entry_submit(Request $request)
    {
        //dd($request->all());
        DB::table('order_query_history')->insert(
            [
                'type'             => 'Query',
                'customer_name'    => $request->get('customerName'),
                'customer_mobile'  => $request->get('customerMobile'),
                'customer_address' => $request->get('customerAddress'),
                'customer_comment' => $request->get('comment'),
                'lead'             => $request->get('queryLead'),
                'added_date'       => date('Y-m-d'),
                'created_at'       => date('Y-m-d H:i:s') // 24 hours
            ]
        );

        $this->orderSummaryDayWise($request->get('queryLead'));
        return 0;
    }

    public function orderSummaryDayWise($lead)
    {
        $today  = date('Y-m-d');
        $result = DB::table("order_query_history")
            ->where('lead', $lead)
            ->whereBetween('added_date', [$today, $today])
            ->get();

        //dd($result);

        $newP    =0;
        $oldP    =0;
        $queryP  =0;

        foreach($result as $data)
        {
            if($data->type=='Order')
            {
                if($data->customer_type=='New')
                {
                    $newP++;
                }
                elseif($data->customer_type=='Old')
                {                    
                    $oldP++;
                }
            }
            elseif($data->type=='Query')
            {
                $queryP++;
            }
        }

        // Single data query execution
        $exiting = DB::table('order_summary')
                    ->where('date',date('Y-m-d'))
                    ->where('lead',$lead)
                    ->first();

        //dd($queryP);

        if($exiting!=Null)
        {
            DB::table('order_summary')->where('date',date('Y-m-d'))
                    ->where('lead',$lead)->update(
                [
                    'total_new'           => $newP,
                    'total_old'           => $oldP,
                    'total_queries'       => $queryP
                ]
            );
        }
        else
        {
            DB::table('order_summary')->insert(
                [
                    'lead'           => $lead,
                    'total_new'      => $newP,
                    'total_old'      => $oldP,
                    'total_queries'  => $queryP,
                    'date'           => date('Y-m-d')
                ]
            );
        }               
    }
    public function qil_history()
    {

        return view('entry/history');
    }
    
     public function daily_statement(Request $request)
    {
        // $fromDate = date('Y-m-d', strtotime($request->get('fromDate')));
        // $toDate   = date('Y-m-d', strtotime($request->get('toDate')));
        // $agentid  = $request->get('agentid');
        
        $results = DB::table('order_summary')
        ->orderBy('order_summary.id','DESC')->get(); 

        //dd($results);
         return view('entry/view', compact('results'));
    }


    
}
