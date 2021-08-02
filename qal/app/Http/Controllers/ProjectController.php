<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = DB::table('projects')->orderBy('id')->get();
        return view('projectInfo/projectMaster', compact('result'));
    }
    public function project_submit(Request $request)
    {
        //dd($request->all());
        DB::table('projects')->insert([
            'name' => $request->get('projectName'),
            'status' => $request->get('projectStatus')
        ]);

        return redirect::to('project-setup')->with('success', 'Successfully Added.');
    }
    public function project_edit($id)
    {
        $edit = DB::table('projects')->where('id',$id)->first();
        $result = DB::table('projects')->orderBy('id', 'DESC')->get();

        return view('projectInfo/projectEdit', compact('result','edit'));
    }

    public function project_update(Request $request)
    {
        //dd($request->all());
        DB::table('projects')->where('id',$request->get('id'))->update([
            'name' => $request->get('projectName'),
            'status' => $request->get('projectStatus')
        ]);

        return redirect::to('project-setup')->with('success', 'Successfully Updated.');
    }

    public function delete($id){
        $delete = DB::table('projects')->where('id',$id)->delete();
        
        return redirect::to('project-setup')->with('success', 'Successfully Delete.');
    }


}
