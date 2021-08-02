<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Concerns\FromCollection;

use DB;
use Auth;

class ExcelExportController extends Controller
{
    public function collection()
    {
        return DB::table('delivery_orders')
                    // ->select('delivery_orders.*','zones.id as zid','zones.name as zname','customers.name as cname')
                    // ->join('zones','zones.id','=','delivery_orders.zoneid')
                    // ->join('customers','customers.id','=','delivery_orders.custid')
                    // ->whereBetween('delivery_orders.do_date', [$fromDate, $toDate])
                    // ->where('delivery_orders.custid', $allCustomers->id)
                    ->get()->toArray();

        //return $reports;
    }
}
