<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index(){
            return view('admin.products.products');
        
        }
        public function show(){
            // $prod=Product::all();
            return view('admin.products.all_products');
        
        }
        public function store(Request $request)
        {
            $request->validate([
                'name'          =>'required|string|min:2|max:50',
                'category_id'   =>'required',
                'price'         =>'required|integer',
                'old_price'     =>'nullable|integer',
                'image'         =>'required|image|mimes:png,jpg,PNG,JPG,JPEG,jpeg',
                 ]);
    
                    $image          =$request->file('image');
                    $ext            = $image->getClientOriginalExtension();
                    $image_new_name =uniqid().'.'.$ext;
                    $image          ->move(public_path('uploads'),$image_new_name);
                    
            Product::insert([
                    'product_name'  =>$request->name,
                    'price'         =>$request->price,
                    'old_price'         =>$request->old_price,
                    'image'         =>$image_new_name,
                    'category_id'   =>$request->category_id,
            ]);
          
            return redirect()->route('product.index');  
        }
        
    public function edit($id)
    {
       $product=Product::FindOrFail($id);
       return view('admin.products.products_edit',compact('product'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name'          =>'required|string|min:2|max:50',
            'price'         =>'required|integer',
            'old_price'     =>'nullable|integer',
            'image'         =>'required|image|mimes:png,jpg,PNG,JPG,JPEG,jpeg',
             ]);

           $category=Product::FindOrFail($id);
            $image_name         =$category->image;
                if($request->hasfile('image'))
                        {
                                if($image_name!=null)   
                                {
                                    unlink(public_path('uploads/'.$image_name));
                                }
                                $image          =$request->file('image');
                                $ext            = $image->getClientOriginalExtension();
                                $image_name     =uniqid().'.'.$ext;
                                $image          ->move(public_path('uploads'),$image_name);
                    }

        $category->update([

            'product_name'  =>$request->name,
            'price'         =>$request->price,
            'old_price'         =>$request->old_price,
            'image'         =>$image_name,
        ]);
        return redirect()->route('product.index');  


    }

    public function dest($id)
            {
        $category=Product::FindOrFail($id);
        $category->delete();
        return redirect()->route('product.index');  

            }
            
    public function details($id)
            {
                $product =Product::find($id);
                return view('store.detail',compact('product'));
            }
    public function all()
            {
                $product =Product::paginate(9);
                return view('store.shop',compact('product'));
            }
    
}
