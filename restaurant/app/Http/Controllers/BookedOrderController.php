<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BookedOrder;
use App\Models\Cart;

class BookedOrderController extends Controller
{
    public function book_order(Request $request)
    {  
        $model=new BookedOrder;
  
        $model->card_holder_name=$request->card_holder;
        $model->card_number=$request->card_number;
        $model->expiration=$request->card_expiration;
        $model->cvv=$request->cvv;
        $model->total_amount=$request->total_amount;
        $model->user_id=Auth::user()->id;
        $model->food_id=1;
        $model->save();

        Cart::where('user_id',Auth::user()->id)->delete();
        session()->flash('order','Your Order Placed Successfully!!');
        return redirect()->back();
    }
    
    public function order_placed()
    {
        $model=BookedOrder::all();
        
        return view('admin.order_placed',['model'=>$model]);
    }

    public function delete_order($id)
    {
        BookedOrder::destroy($id);
        session()->flash('message','Deleted Successfully!!');
        return redirect()->back();
    }
 
}
