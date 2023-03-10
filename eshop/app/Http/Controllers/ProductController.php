<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Card;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data=Product::all();
        return view('product',['products'=>$data]);
    }

    public function detail($id){
        $data=Product::find($id);
        return view('detail',['data'=>$data]);
    }
    public function add_to_card(Request $request)
    {
        if(session()->has('login'))          
        {
            $cart = new Card;
            $cart->user_id=session('user_id');
            $cart->product_id=$request->add_to_card;
            $cart->save();
            return redirect(request()->headers->get('referer'));
        }
        else{
            session()->flash('error','First Login Then Add To Cart Action Perform');
            return redirect('/login');
        }
    }
    static public function card_item(){/* Important  */
        $userId=session('user_id');
        $card=Card::where('user_id',$userId)->count();
        return $card;
    }
    public function card_list(){
        $userId=session('user_id');
        $products=DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.*','cart.id as cart_id')
            ->get();
            
            return view('cardlist',['products'=>$products]);
    }
    public function remove_cart($id)
    {
        Card::destroy($id);
        return redirect('card_list');
    }
    public function order_now(){
        $userId=session('user_id');
        $total = $products=DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->sum('products.price');
            
            return view('ordernow',['total'=>$total]);
           
    }
    public function order_place(Request $request)
    {
        $userId=session('user_id');
        $allCart= Card::where('user_id',$userId)->get();
        foreach($allCart as $cart)
        {
            $order= new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="Pending";
            $order->payment_method=$request->payment;
            $order->payment_status="Pending";
            $order->address=$request->address;
            $order->save();
            Card::where('user_id',$userId)->delete();
        }
        $request->input();
        return redirect('/');
    }

    public function my_order()
    {
        $userId=session('user_id');
        $orders = $products=DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$userId)
            ->get();
            
            return view('myorder',['orders'=>$orders]);
           
    }
    
}
