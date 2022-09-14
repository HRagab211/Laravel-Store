<?php

namespace App\Models;


class Cart
{

        public $items=[];
        public $totalQTY;
        public $totalprice;

        public function __construct($cart=null)
            {
                if ($cart)
                {
                    $this->items        =$cart->items;
                    $this->totalQTY     =$cart->totalQTY;
                    $this->totalprice   =$cart->totalprice;
                }
                else{
                    $this->items        =[];
                    $this->totalQTY     =0;
                    $this->totalprice   =0;
                }
            }

        public function addto_cart($product)
            {
                $items=[
                    'id'=>$product->id,
                    'product_name'=>$product->product_name,
                    'price'=>$product->price,
                    'image'=>$product->image,
                    'qty'=>0

                ];

                if(!array_key_exists($product->id,$this->items))
                    {
                        $this->items[$product->id]=$items;
                        $this->totalQTY+=1;
                        $this->totalprice+=$product->price;
                    }
                else
                    {
                        $this->totalQTY+=1;
                        $this->totalprice+=$product->price;
                    }
                $this->items[$product->id]['qty']+=1;
            }
    public  function remove($id)
        {
             if(array_key_exists($id,$this->items))
                {
                    $this->totalQTY   -= $this->items[$id]['qty'];
                    $this->totalprice -= $this->items[$id]['qty']*$this->items[$id]['price'];
                    unset($this->items[$id]);
                }

        }
    public  function  decreament($id)
        {
            if (array_key_exists($id,$this->items))
                {
                    $this->items[$id]['qty']-=1;
                    $this->totalQTY-=1;
                    $this->totalprice-=$this->items[$id]['price'];
                }
        }
    public  function  increament($id)
        {
            if (array_key_exists($id,$this->items))
            {
                $this->items[$id]['qty']+=1;
                $this->totalQTY+=1;
                $this->totalprice+=$this->items[$id]['price'];

            }
        }

    public function delte_all()
        {
                $this->items=[];
                $this->totalQTY=0;
                $this->totalprice=0;
                session()->forget('cart');
        }
}
