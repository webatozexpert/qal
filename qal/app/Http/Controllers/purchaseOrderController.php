<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use DB;
use Auth;

class purchaseOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function purchaseorder_create()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $result = DB::table('purchase_general_items')
        ->select('purchase_general_items.*','purchase_item_groups.name as gname','purchase_item_categories.name as sgname','purchase_item_subgroups.name as cname','purchase_item_units.unit')

        ->join('purchase_item_groups','purchase_item_groups.id','=','purchase_general_items.itemgroup_id')
        ->join('purchase_item_categories','purchase_item_categories.id','=','purchase_general_items.itemsubgroup_id')
        ->join('purchase_item_subgroups','purchase_item_subgroups.id','=','purchase_general_items.item_category_id')
        ->join('purchase_item_units','purchase_item_units.id','=','purchase_general_items.item_unit_id')
        ->orderBy('purchase_general_items.id','DESC')->get();
        
        return view('purchaseorder/purchaseorderNew', compact('result','allZones'));
    }
    

}
