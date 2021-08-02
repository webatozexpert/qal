<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use DB;
use Auth;
class LoginController extends Controller
{
    public function index()
    {
        return view('masterLogin');
    }

    public function login(Request $request)
    {
        // default (12345) : $2y$10$pVJ5ageXK3d7ya.ELwFN.uzpYwIi3ojhjTxHx2iMqP2yL4Dnh8bPu

        $username   = $request->get('email');
        $password   = $request->get('password');
        $remember   = $request->get('remember');

        $checkAccess = DB::table('users')
                    ->where('email', $username)
                    ->count();

        if($checkAccess > 0)
        {     
            if (Auth::attempt(['email' => $username, 'password' => $password])) 
            {   
                //echo 'Yes';
                return Redirect::to('/dashboard');
            } 
            else
            {
               return Redirect::back()->withInput($request->all)->with('msg', 'Invalid username or password.');
            }
        }
        else
        {
            return Redirect::back()->withInput($request->all)->with('msg', 'Invalid username');
        }     
    }
}
