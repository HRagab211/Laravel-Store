<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public function index(){

        return view('admin.panel.index');
        // return 'hello admin';
    }
    public function button(){

        return view('admin.panel.button');
        // return 'hello admin';
    }
    public function typography(){

        return view('admin.panel.typography');
        // return 'hello admin';
    }
    public function element(){

        return view('admin.panel.element');
        // return 'hello admin';
    }
    public function widget(){

        return view('admin.panel.widget');
        // return 'hello admin';
    }
    
    public function form(){

        return view('admin.panel.form');
        // return 'hello admin';
    }
    
    public function table(){

        return view('admin.panel.table');
        // return 'hello admin';
    }
    
    
    public function chart(){

        return view('admin.panel.chart');
        // return 'hello admin';
    }
    
    public function signin(){

        return view('admin.panel.signin');
        // return 'hello admin';
    }
    

    
    public function p404(){

        return view('admin.panel.404');
        // return 'hello admin';
    }
    public function blank(){

        return view('admin.panel.blank');
        // return 'hello admin';
    }
    

    
}
