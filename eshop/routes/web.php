<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


Route::get('/login', function () {
    return view('login');
})->name('loginPage');

Route::get('/logout',function(){
    session()->forget('login');
    return redirect('/login');
});

Route::post('/login',[UserController::class,'login']);
Route::get('/',[ProductController::class,'index']);
Route::get('/detail/{id}',[ProductController::class,'detail']);
Route::post('/detail/add_to_card',[ProductController::class,'add_to_card']);
Route::get('/card_list',[ProductController::class,'card_list']);
Route::get('remove_cart/{id}',[ProductController::class,'remove_cart']);
Route::get('/order_now',[ProductController::class,'order_now']);
Route::post('/order_place',[ProductController::class,'order_place']);
Route::get('/my_order',[ProductController::class,'my_order']);