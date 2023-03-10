<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/add_doctor_view',[AdminController::class,'add_doctor_view']);
Route::post('/add_doctor',[AdminController::class,'add_doctor']);
Route::get('/adminAppointment',[AdminController::class,'adminAppointment']);
Route::get('/appoinmentStatus/{id}',[AdminController::class,'appoinmentStatus']);
Route::get('/admin_show_doctor',[AdminController::class,'admin_show_doctor']);
Route::get('/delete_doctor/{id}',[AdminController::class,'delete_doctor']);
Route::get('/update_doctor_record/{id}',[AdminController::class,'update_doctor_record']);
Route::post('/change_doctor_data/{id}',[AdminController::class,'change_doctor_data']);
Route::get('/add_news',[AdminController::class,'add_news']);


Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/my_appoinment',[HomeController::class,'my_appoinment']);
Route::get('/cancleAppoinment/{id}',[HomeController::class,'cancleAppoinment']);
Route::post('/blogs',[HomeController::class,'blogs']);
Route::get('/show_blog',[HomeController::class,'show_blog']);

/* Route::get('/blog',function(){
    return view('user.blog');
}); */
/* Route::view('blog','user.blog'); */