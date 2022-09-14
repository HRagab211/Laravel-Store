<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if (session()->missing('cart') || session()->get('cart')->totalQTY<=0)
        {
            return back()->with('chekout_faild','Your Cart is empty try add Some products');
            
        }
        return view('store.checkout');
    }
}
