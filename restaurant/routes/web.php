<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouponCodeController;
use App\Http\Controllers\BookedOrderController;

Route::get('/',[HomeController::class,'index']);
Route::get('/redirect',[HomeController::class,'redirect']);
Route::post('/reservation',[HomeController::class,'reservation']);
Route::post('/cart/{id}',[HomeController::class,'cart']);
Route::get('/cartData',[HomeController::class,'cartData'])->name('cardData');
Route::get('/delete_cart_item/{id}',[HomeController::class,'delete_cart_item']);

Route::get('users',[AdminController::class,'users']);
Route::get('/delete_user/{id}',[AdminController::class,'delete_user']);
Route::get('food_menu',[AdminController::class,'food_menu']);
Route::post('add_food',[AdminController::class,'add_food'])->name('add_food');
Route::get('update_food/{id}',[AdminController::class,'update_food']);
Route::post('update_food',[AdminController::class,'updateFood']);
Route::get('show_reservation',[AdminController::class,'show_reservation']);
Route::get('delete_reservation/{id}',[AdminController::class,'delete_reservation']);
Route::get('chef',[AdminController::class,'chef'])->name('chef');
Route::post('add_chef',[AdminController::class,'add_chef']);
Route::get('delete_chef/{id}',[AdminController::class,'delete_chef']);
Route::get('update_chef/{id}',[AdminController::class,'update_chef']);
Route::post('update_chef_data/{id}',[AdminController::class,'update_chef_data']);


Route::get('coupon_code',[CouponCodeController::class,'index'])->name('coupon_code');
Route::get('add_coupon',[CouponCodeController::class,'add_coupon']);
Route::post('addCoupon',[CouponCodeController::class,'addCoupon']);
Route::get('coupon_status/{status}/{id}',[CouponCodeController::class,'coupon_status']);
Route::get('update_coupon/{id}',[CouponCodeController::class,'update_coupon']);
Route::post('updateCoupon/{id}',[CouponCodeController::class,'updateCoupon']);/* ye form banaye usake action me url dale */
Route::get('delete_coupon/{id}',[CouponCodeController::class,'delete_coupon']);
Route::get('apply_coupon',[CouponCodeController::class,'apply_coupon']);

Route::post('/book_order',[BookedOrderController::class,'book_order']);
Route::get('/order_placed',[BookedOrderController::class,'order_placed']);
Route::get('delete_order/{id}',[BookedOrderController::class,'delete_order']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
