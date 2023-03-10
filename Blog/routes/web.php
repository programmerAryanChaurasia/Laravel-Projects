<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FrontController;


Route::get('/',[FrontController::class,'home']);
Route::get('/post/{id}',[FrontController::class,'post']);
Route::get('/page/{id}',[FrontController::class,'page']);

/* Route::get('/contact', function () {
    return view('fornt_end.contactUs');
});
Route::get('/about', function () {
    return view('fornt_end.about');
}); */


Route::get('admin/login',[UserController::class,'login']);
Route::post('admin/login_submit',[UserController::class,'login_submit']);
Route::get('admin/logout',function(){
    session()->forget('UserID');
    return redirect('admin/login');
});

Route::group(['middleware'=>['admin_auth']],function()
{
    Route::get('/admin/post/list',[AdminController::class,'postList']);
    Route::post('/admin/post/add/submit',[AdminController::class,'postSubmit']);
    Route::get('/admin/post/add',[AdminController::class,'postAdd']);
    Route::get('/admin/post/edit/{id}',[AdminController::class,'postEdit']);
    Route::post('/admin/post/edit/submit/{id}',[AdminController::class,'postUpdate']);
    Route::get('/admin/post/delete/{id}',[AdminController::class,'postDelete']);
    Route::get('/admin/post/status/{statusID}/{id}',[AdminController::class,'postStatus']);

    Route::get('/admin/page/list',[PageController::class,'pageList']);
    Route::post('/admin/page/add/submit',[PageController::class,'pageSubmit']);
    Route::get('/admin/page/add',[PageController::class,'pageAdd']);
    Route::get('/admin/page/edit/{id}',[PageController::class,'pageEdit']);
    Route::post('/admin/page/edit/submit/{id}',[PageController::class,'pageUpdate']);
    Route::get('/admin/page/delete/{id}',[PageController::class,'pageDelete']);
    Route::get('/admin/page/status/{statusID}/{id}',[PageController::class,'pageStatus']);

    Route::get('/admin/contact/list',[ContactUsController::class,'contactList']);
});





