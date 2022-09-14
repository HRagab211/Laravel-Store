<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function get()
        {
        $test=  DB::table('sales')
                    ->join('orders','sales.order_id','=','orders.id')
                    ->join('users','sales.user_id','=','users.id')
                    ->select('users.name','orders.*','sales.sold_at')
                    ->orderBy('sales.sold_at','DESC')
                    ->get();

                    dd($test);

        }
}
