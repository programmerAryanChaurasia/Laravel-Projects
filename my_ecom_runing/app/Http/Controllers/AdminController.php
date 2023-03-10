<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function index()
    {
        if( session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }
        else{
            return view('admin.login');
        }
/* 
        return view('admin.login'); */
    }

    
    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password' );

        $result=Admin::where(['email'=>$email])->first();
        
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                session(['ADMIN_LOGIN'=>true]);
                session(['ADMIN_ID'=>$result->id]);
                return redirect('admin/dashboard');
            }
            else{
                $request->session()->flash('error','Please Enter Valid Password');
                return redirect('admin');
            }
        }
        else{
            $request->session()->flash('error','Please Enter Resisterd Email Id');
            return redirect('admin');
        }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    /* public function encrip(){   // Encript password
        $ad=Admin::find(1);
        $ad->password=Hash::make('sachin');
        $ad->save();
    } */
}
