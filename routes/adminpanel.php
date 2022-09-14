<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

//---------------------------------------Admin---------------------------------------
Route::middleware('is_admin')->group(function(){

    Route::controller(PanelController::class)->group(function(){
    Route::get("panel",'index')                     ->name('panel');
});
    
    Route::get("admin/logout",[AdminController::class,'logout'])->name('admin.logout');

    Route::controller(CategoryController::class)->group(function(){
    Route::get('categories','categories')           ->name('category.index');
    Route::get('categories/edit/{id}','edit')       ->name('category.edit');
    Route::post('category/store','store')           ->name('category.store');
    Route::post('category/update/{id}','update')    ->name('category.update');
    Route::get('category/destroy/{id}','destory')   ->name('category.destory');

    });

    Route::controller(ProductController::class)->group(function(){

        Route::get('products','index')                          ->name('product.index');
        Route::get('products/edit/{id}','edit')                 ->name('product.edit');
        Route::get('products/destroy/{id}','dest')              ->name('product.destroy');
        Route::get('products/all','show')                       ->name('product.all');
        Route::post('products/store','store')                   ->name('products.store');
        Route::post('products/update/{id}','update')            ->name('products.update');

    });
    Route::controller(OrderController::class)->group(function(){
        Route::get('orders','index')                             ->name('orders.index');
        Route::get('orders/confirmed','confirmed')               ->name('orders.confirmed');
        Route::get('order/details/{order}','get_details')        ->name('orders.details');
        Route::get('order/confirm/{order}','confirm_order')      ->name('orders.confirm'); 
        Route::get('order/unconfirm/{order}','unconfirm_order')  ->name('orders.unconfirm'); 
        Route::get('order/message/{order}','order_done')         ->name('orders.done');
        Route::get('order/delete/{order}','delete')              ->name('order.delete');
        
        });
        Route::controller(SalesController::class)->group(function(){
            Route::get('sales/get','get')                       ->name('sales.get');
        });
        Route::controller(TaskController::class)->group(function(){
            Route::post('Task/add','add')                       ->name('task.add');
            Route::get('Task/done/{task}','done')               ->name('task.done');
        });

        //--------Make Notification Read--------------------------------------------
        Route::get('noty/read/{id}',function($id){

            $not=DB::table('notifications')->where('data->order_id',$id)->pluck('id');
            DB::table('notifications')->where('id',$not)->update(['read_at'=>now()]);
            return redirect(route('orders.details',$id));

                })                                              ->name('make.read');

    
});
