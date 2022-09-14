<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('detail', function () {
    return view('store.detail');
});
Route::get('contact', function () {
    return view('store.contact');
});
Route::get('checkout', function () {
    return view('store.checkout');
});



//---------------------------Store Home page------------------------------------------
Route::controller(StoreHomeController::class)->group(function(){

    Route::get('/','index')->name('store.index');


});



//------------------------------------User--------------------------------------------
Route::middleware('is_user')->group(function(){
    Route::get('logout',[UserController::class,'logout'])->name('logout');

    Route::controller(ProductController::class)->group(function(){
            Route::get('product/view/details/{id}','details')->name('product.details');
            Route::get('product/view','all')->name('products');

        });

        Route::controller(CartController::class)->group(function(){
            Route::get('cart','index')->name('cart.index');
            Route::get('cart/add/{product}','add')->name('cart.add');
            Route::get('cart/delete/{product}','destory')->name('cart.destroy');
            Route::get('cart/delete_all','delete_all')->name('cart.delete_all');
            Route::get('cart/dec/{product}','decreament')->name('cart.dec');
            Route::get('cart/inc/{product}','increament')->name('cart.inc');
            
            });
    Route::controller(CheckoutController::class)->group(function(){
        Route::get('chekcout','index')->name('checkout.index');
    });    
    
    Route::controller(OrderController::class)->group(function(){
        Route::post('order/save','save_order')->name('order.save');
    });    
    


});

//-----------------------------------Guest------------------------------------------
Route::middleware('isguest')->group(function(){
    Route::controller(UserController::class)->group(function(){

        Route::get('login','logindex')          ->name('login.index');
        Route::post('login/verify','verify')    ->name('login.verify');
        Route::get('signup','signup')           ->name('guest.signup');
        Route::post('signup/store','store')     ->name('signup.store');
    });


Route::controller(AdminController::class)->group(function(){
        Route::get('admin/log','index');
        Route::post('admin/verify','verify')->name('admin.verify');

    });
    
    //---------------------------------Cart---------------------------------------------------------


});

//------------------------------product in category-----------------------------------------
Route::controller(CategoryController::class)->group(function(){
        Route::get('Category/products/{id}','products')->name('category.products');
});


//------------------------------------------------------------------------------------------



require __DIR__.'../adminpanel.php';
