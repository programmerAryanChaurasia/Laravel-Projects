<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;


Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');//This route active After login page is success full login

Route::group(['middleware'=>['admin_auth']],function () {
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);

    Route::get('admin/category',[CategoryController::class,'index'])->name('category');
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category'])->name('manage.category');
    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category'])->name('edit');
    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status'])->name('status_category');  

    Route::get('admin/coupon',[CouponController::class,'index'])->name('coupon');
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon'])->name('manage.coupon');
    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon'])->name('coupon_edit');
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status'])->name('status_category');

    Route::get('admin/size',[SizeController::class,'index'])->name('size');
    Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
    Route::get('admin/size/manage_size',[SizeController::class,'manage_size'])->name('manage.size');
    Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size'])->name('size_edit');
    Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status'])->name('status_size');

    Route::get('admin/color',[ColorController::class,'index'])->name('color');
    Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);
    Route::get('admin/color/manage_color',[ColorController::class,'manage_color'])->name('manage.color');
    Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color'])->name('color_edit');
    Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status'])->name('status_color');

    Route::get('admin/product',[ProductController::class,'index'])->name('product');
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product'])->name('manage.product');
    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product'])->name('product_edit');
    Route::post('admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status'])->name('status_product');

    Route::get('admin/product/product_attr_delete/{paid}/{pid}',[ProductController::class,'product_attr_delete']);
    Route::get('admin/product/product_images_delete/{piid}/{pid}',[ProductController::class,'product_images_delete']);

    Route::get('/admin/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout SuccessFully ');
        return redirect('admin');
    });
   
});










/* Route::get('admin/encrip',[AdminController::class,'encrip']); */ //This line use to encript password

/*     Route::get('/check',function(){  //Hash::make(), Hash::check() method 
        $password='12345';
        $hashPass=Hash::make('12345');

        if(Hash::check($password,$hashPass)){//check() take two parameter first parameter is normal(string or number ....) and second is encripted
            return "password Match";
        }
        else{
            return "No match";
        }
    }); */