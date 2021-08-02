<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FactoryController;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$zoneData = new ZoneController;
        $allZones = $zoneData->allZonesCount();

        $customerData = new CustomerController;
        $allCustomer  = $customerData->allCustomerCount();

        $orderData = new OrderController;
        $allOrder  = $orderData->allOrderCount();


        $factoryData = new FactoryController;
        $allGetPass  = $factoryData->allGetPassCount();
        $allChallan  = $factoryData->allChallanCount();
        $allInvoice  = $factoryData->allInvoiceCount();

    	$totalZones     = $allZones;
    	$totalCustomers = $allCustomer;

        return view('middleDashboard', compact('totalZones','totalCustomers','allOrder','allGetPass','allChallan','allInvoice'));
    }
}
