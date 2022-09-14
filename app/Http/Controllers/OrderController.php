<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Sales;
use App\Models\Product;
use App\Mail\CustomerMail;
use Illuminate\Http\Request;
use App\Models\Orderd_Products;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;


class OrderController extends Controller
{
    public function index()
        {
            $orders = Order::where('Confirmed','0')->get();
            return view('admin.orders.all_orders',compact('orders')) ;
        }

    public function confirmed()
        {
            $orders = Order::where('Confirmed','1')->get();
            return view('admin.orders.confirmed_orders',compact('orders')) ;
        }

    public function save_order(Request $request)
        {
            $order_id=rand(10,8999);
                if(Order::find($order_id))
                    {
                            $order_id=random_int(9000,20000);
                    }
        $id=Auth::user()->id;
            $request->validate([
                'fname'=> 'Required|String|Min:2',
                'lname'=> 'Required|String|Min:2',
                'email'=> 'Required|Email',
                'phone'=> 'Required|Min:8',
                'add1' => 'Required',
                'add2' => 'Nullable',
                'city' => 'Required',
                'state'=> 'Required',
                'zip'  => 'Required|Min:5',
                  ]);

            Order::create([
                'id'=>          $order_id,
                'First_name'    =>$request->fname,
                'Last_name'     =>$request->lname,
                'email'         =>$request->email,
                'phone'         =>$request->phone,
                'Address_1'     =>$request->add1,
                'Address_2'     =>$request->add2,
                'City'          =>$request->city,
                'state'         =>$request->state,
                'zip'           =>$request->zip,
                'user_id'       =>$id,
                'total'         =>$request->total
            ]);
            foreach ($request->prod as $prod_id){
                Orderd_Products::insert([
                    'product_id' =>$prod_id,
                    'user_id'    =>$id,
                    'oder_id'   =>$order_id
            ]);
            }
        $cart = new Cart(session()->get('cart'));
        $cart->delte_all();
        $admin=Admin::all();
        Notification::send($admin,new OrderCreated(Auth::user()->name,$order_id));
        return redirect(route('store.index'))->with('success',' Your Order has been successfully Confirmed');
        }

    public function get_details(Order $order)
        {
                    $products_id   =  Orderd_Products::where('oder_id',$order->id)->pluck('product_id');
                     $products=[];
                    foreach($products_id as $product)
                        {
                           $item= Product::find($product);
                           array_push($products,$item);
                        }

            return view('admin.orders.order_details',compact('order','products'));
        }
    public function confirm_order(Order $order)
        {
            $order->update([
                'Confirmed' => '1',
                'updated_at'=>now()
            ]);

            DB::table('sales')->insert([
                'order_id'=>$order->id,
                'user_id'=>$order->user_id

            ]);
            return redirect(route('orders.index'))->with('success','Order is confirmed Successfully *AND* will be in Confirmed Orders');
        }
        public function unconfirm_order(Order $order)
        {
            $order->update([
                'Confirmed' => '0',
                'updated_at'=>now()
            ]);
            Sales::where('order_id',$order->id)->delete();
            return redirect(route('orders.index'))->with('success','Order Unconfirmed will be in Recent Orders');
        }

    public function order_done(Order $order)
        {
            $user = User::find($order->user_id);

            $products_id   =  Orderd_Products::where('oder_id',$order->id)->pluck('product_id');
            $products=[];
        foreach($products_id as $product)
            {
                $item= Product::find($product);
                array_push($products,$item);
            }
            Mail::to($user->email)->send(new CustomerMail($user,$products));
            return back()->with('success','Email has been sent successfully');
        }
    public function delete(Order $order)
        {
            $order->delete();
            return redirect(route('orders.index'))->with('success','Order has been Deleted successfully');


        }

}
