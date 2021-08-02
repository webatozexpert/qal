<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function page_index()
    {
        $result = DB::table('suppliers')
        ->select('suppliers.*','city_names.city_name as city_id')
        ->join('city_names','city_names.id','=','suppliers.city_id')
        ->where('suppliers.status',0)->orderBy('suppliers.id')
        ->get();

        $cityName = DB::table('city_names')
        ->where('status',0)->orderBy('id')
        ->get();

        return view('supplier/supplierMaster', compact('result','cityName'));
    }

    public function submit(Request $request)
    {
        //dd($request->all());
        DB::table('suppliers')->insert([
            'company_name'        => $request->get('company_name'),
            'contact_person'     => $request->get('contact_person'),
            'contact_no'  => $request->get('contact_no'),
            'address' => $request->get('address'),
            'city_id' => $request->get('city_id')
        ]);

        return redirect::to('supplier-setup')->with('success', 'Successfully Added.');
    }
   
    public function new_city_submit(Request $request)
    {
        //dd($request->all());
        DB::table('city_names')->insert([
            'city_name'  => $request->get('city_name')
        ]);

        return redirect::back()->with('success', 'Successfully Added.');
    }

    public function edit($id)
    {
        
        $result = DB::table('suppliers')
        ->select('suppliers.*','city_names.city_name as city_id')
        ->join('city_names','city_names.id','=','suppliers.city_id')
        ->where('suppliers.status',0)->orderBy('suppliers.id')
        ->get();

        $cityName = DB::table('city_names')
        ->where('status',0)->orderBy('id')
        ->get();
        $edit = DB::table('suppliers')->where('id',$id)->first();

        return view('supplier/supplierEdit', compact('result','cityName','edit'));
    }

    public function update(Request $request)
    {
       // dd($request->all());
        DB::table('suppliers')->where('id',$request->get('id'))->update([
            'company_name'   => $request->get('company_name'),
            'contact_person' => $request->get('contact_person'),
            'contact_no'     => $request->get('contact_no'),
            'address'        => $request->get('address'),
            'city_id'        => $request->get('city_id')
        ]);
        
        return redirect::to('supplier-setup')->with('success', 'Successfully Updated.');
    }


    public function delete($id){
        $delete = DB::table('suppliers')->where('id',$id)->delete();
        
        return redirect::to('supplier-setup')->with('success', 'Successfully Delete.');
    }

   
}
