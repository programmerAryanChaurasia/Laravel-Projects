<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Cart;

class HomeController extends Controller
{
   public function index()
   {
        $food=Food::all();
        $cart=0;
        return view('home',['food'=>$food,'cart'=>$cart]);
   }

   public function redirect()
   {
        $userType=Auth::user()->usertype;

        if($userType==1){

        return view('admin.home');
        }
        else {

          if(Auth::id())
          {
               $auth_id=Auth::id();
              /*  dd($auth_id); */
               $cart=Cart::where('user_id',$auth_id)->distinct()->count('food_id');
          }
          else{
               $cart=0;
          }

            $food=Food::all();
            return view('home',['food'=>$food,'cart'=>$cart]);
            return view('home');
        }
   }

   public function reservation(Request $request)
   {
          $model=new Reservation;

          $model->name=$request->name;
          $model->email=$request->email;
          $model->phone=$request->phone;
          $model->date=$request->date;
          $model->time=$request->time;
          $model->message=$request->message;
          $model->number_guests=$request->number_guests;

          $model->save();
          session()->flash('message','Reservation Booked successfully!!');
          return redirect()->back();
   }

   public function cart(Request $request,$id)
      {
         
          $userId=Auth::user()->id;
       /*    dd($userId); */
          $cart="";
          $cart=Cart::where('food_id',$id)->where('user_id',$userId)->first();
          
          
        /*   dd($foodCount); */

          if($cart){
               /* update */
            /*  $oldCart=$model->bookCart; */

               $cart->bookCart=$request->bookCart ;
               $cart->user_id=Auth::id();
               $cart->food_id=$id;
          }
          else{
               /* Insert new data */
               $cart=new Cart;
               $cart->bookCart=$request->bookCart;
               $cart->user_id=Auth::id();
               $cart->food_id=$id;
     
          }

        
          $cart->save();
          return redirect()->back();
   }

   public function cartData()
   {
          $currentUser=Auth::user()->id;
          $cart=DB::table('carts')
          ->select('carts.*','food.id as foodId','food.title as title','food.price as price','food.description as description','food.image as image')
          ->join('food','carts.food_id','=','food.id')->where('carts.user_id',$currentUser)->get();

         /* echo "<pre>";
         print_r($cart);
         die(); */
         $couponPrice=0;
          return view('user.cardData',['cartData'=>$cart,'data' => $couponPrice]);
   }

   public function delete_cart_item($id)
   {
          Cart::destroy($id);
          return redirect()->back();
   }
}
