<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
        {
         if (session()->has('cart'))
         {
            $products= new Cart(session()->get('cart'));
        }
        else{
            $products=null;
        }
        //  return view('store.cart')->with('null','There are no product in the cart TRY add some');
        return view('store.cart',compact('products'));

        }

        public function add(Product $product)
            {

                if (session()->has('cart'))
                        {
                            $cart=new Cart(session()->get('cart'));
                        }
                    else
                        {
                            $cart=new Cart();
                        }
                $cart->addto_cart($product);
                session()->put('cart',$cart);
                return back()->with('cart_success','product added successfully to the cart');
            }
        public function decreament(Product $product)
            {
                $cart = new Cart(session()->get('cart'));
                $cart->decreament($product->id);
                if ($cart->totalQTY<=0)
                    {
                        session()->forget('cart');
                    }
                else
                    {
                        session()->put('cart',$cart);
                    }
            return back()->with('success','Product has been updated successfully');

            }
    public function increament(Product $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->increament($product->id);

        session()->put('cart',$cart);
        return back()->with('success','Product has been updated successfully');

    }
            public function destory(Product $product)
            {
                    $cart = new Cart(session()->get('cart'));

//                    dd($cart->items[$product->id]);
                    $cart->remove($product->id);
                    if($cart->totalQTY<=0)
                        {
                            session()->forget('cart');
                        }
                    else
                        {
                            session()->put('cart',$cart);
                        }
                return back()->with('success','Product has been deleted successfully');
            }
            public function delete_all()
            {
                $cart = new Cart(session()->get('cart'));
                $cart->delte_all();
                return back();
            }
}
