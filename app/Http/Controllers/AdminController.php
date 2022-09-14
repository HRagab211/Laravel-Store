<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login.index');
    }

    public function verify(Request $request){

        $request->validate([
            'name'      =>'required',
            'password'  =>'required',
        ]);

        $crad=$request->only('name','password');

        if (Auth::guard('admin')->attempt($crad))
        {
            return redirect()->route('panel');
        }
        else
        {

            return 'Access Denied';
        }
    }
    public function logout(){
        if (Auth::guard('admin')->check())
        {
            Auth::guard('admin')->logout();
            return redirect()->route('store.index');
        }
        return redirect()->route('store.index');
    }
}
