<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class StoreHomeController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('store.index',compact('categories'));
    }
}
