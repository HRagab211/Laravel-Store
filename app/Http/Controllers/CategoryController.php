<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //----------------------------------------------------------------------------------
    public function categories(){
            $cats=Category::all();
        return view('admin.category.categories',compact('cats'));
        // return 'hello admin';
    }
    //----------------------------------------------------------------------------------
    
    public function store(Request $request)
    {
$request->validate([
    'name'  =>'required|string|min:2|max:50',
    'image' =>'required|image|mimes:png,jpg,PNG,JPG,JPEG,jpeg',
]);

            $image          =$request->file('image');
            $ext            = $image->getClientOriginalExtension();
            $image_new_name =uniqid().'.'.$ext;
            $image          ->move(public_path('uploads'),$image_new_name);

        $Category = new Category();
        $Category->name  =$request->name;
        $Category->image =$image_new_name;
        $Category->save();
        return redirect()->route('category.index');  
    }
    //----------------------------------------------------------------------------------
    public function edit($id)
    {
        $category=Category::FindOrFail($id);
        return view('admin.category.category_edit',compact('category'));
        }

        public function update(Request $request,$id){
            $request->validate([
                'name'  =>'required|string|min:2|max:50',
                'image' =>'required|image|mimes:png,jpg,PNG,JPG,JPEG,jpeg',
            ]);
            $category=Category::FindOrFail($id);
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

                'name'=>$request->name,
                'image'=>$image_name,
            ]);
            return redirect()->route('category.index');  
        }

            
        //----------------------------------------------------------------------------------
        public function destory($id){
            $category=Category::FindOrFail($id);
            $category->delete();
            return redirect()->route('category.index');  

        }
        
        //----------------------------------------------------------------------------------
        public function products($id)
        {
            $products=Category::find($id)->products;
            return view('store.related_products',compact('products'));
        }
        
}