<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class RecentSales extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $sales=  DB::table('sales')
        ->join('orders','sales.order_id','=','orders.id')
        ->join('users','sales.user_id','=','users.id')
        ->select('users.name','orders.*','sales.sold_at')
        ->orderBy('sales.sold_at','DESC')
        ->get();

        return view('components.recent-sales',compact('sales'));
    }
}
