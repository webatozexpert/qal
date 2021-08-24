<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

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

        return 0;
    }

    public function orderSummaryDayWise($lead)
    {
        $today  = date('Y-m-d');
        $result = DB::table("order_query_history")
            // ->where('type', 'Order')
            ->whereBetween('added_date', [$today, $today])
            ->get();

        $new   =0;
        $old   =0;
        $query =0;
        $leadType ='';
        foreach($result as $data)
        {
            if($data->lead=='Phone' && $data->type=='Order')
            {
                $leadType = $data->lead;
                if($data->lead=='Phone' && $data->customer_type=='New')
                {
                    $new ++;
                }
                elseif($data->lead=='Phone' && $data->customer_type=='Old')
                {                    
                    $old ++;
                }
            }

            if($data->lead=='Message' && $data->type=='Order')
            {
                $leadType = $data->lead;
                if($data->lead=='Message' && $data->customer_type=='New')
                {
                    $new ++;
                }
                elseif($data->lead=='Message' && $data->customer_type=='Old')
                {                    
                    $old ++;
                }
            }

            if($data->lead=='Facebook' && $data->type=='Order')
            {
                $leadType = $data->lead;
                if($data->lead=='Facebook' && $data->customer_type=='New')
                {
                    $new ++;
                }
                elseif($data->lead=='Facebook' && $data->customer_type=='Old')
                {                    
                    $old ++;
                }
            }

            if($data->lead=='Phone' && $data->type=='Query')
            {
                $leadType = $data->lead;
                if($data->lead=='Phone')
                {
                    $query ++;
                }
            }

            if($data->lead=='Message' && $data->type=='Query')
            {
                $leadType = $data->lead;
                if($data->lead=='Message')
                {
                    $query ++;
                }
            }

            if($data->lead=='Facebook' && $data->type=='Query')
            {
                $leadType = $data->lead;
                if($data->lead=='Facebook')
                {
                    $query ++;
                }
            }
        }

        DB::table('order_summary')->insert(
            [
                'lead'          => $lead,
                'new'           => $new,
                'old'           => $old,
                'query'         => $query,
                'date'          => date('Y-m-d')
            ]
        );
    }
}
