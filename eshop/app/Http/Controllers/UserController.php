<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $user='';
        $user=User::where('email',$request->email)->first();
        if($user!=''){
            if(Hash::check($request->password,$user->password)){/* $user->password==$request->password */
                session(['login'=>$user->name]);
                session(['user_id'=>$user->id]);
                return redirect('/');
            }
            else{
                session()->flash('error','Please Enter Valid Password!!');
                return redirect()->route('loginPage');
            }

        }
        else{
            session()->flash('error','Please Enter Registered Email!!');
            return redirect()->route('loginPage');
        }
    }
}
