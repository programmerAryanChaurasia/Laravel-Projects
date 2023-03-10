<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller 
{
   public function login()
   {
        return view('admin.login');
   }

   public function login_submit(Request $request)
   {
          $email=$request->email;
          $password=$request->password;

          $result=DB::table('users')
          ->where('email',$email)
          ->where('password',$password)
          ->get();

         /*  echo "<pre>";
          print_r($result[0]);
          die(); */

          if(isset($result[0]->id)){
               if($result[0]->status==1){
                    session(['UserID'=>$result[0]->id]);
                    session(['UserName'=>$result[0]->name]);
                    return redirect('admin/post/list');
               }
               else{
               session()->flash('message','Acount Deactivated');
               return redirect('admin/login');
               }
          }
          else{
               session()->flash('message','Please Insert Right Log in Detail');
               return redirect('admin/login');
          }

       
   }

}
