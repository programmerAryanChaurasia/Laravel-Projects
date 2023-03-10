<?php

namespace App\Http\Controllers;

use App\Models\CouponCode;
use Illuminate\Http\Request;

class CouponCodeController extends Controller
{
    
    public function index()
    {
        $model=CouponCode::all();
        
       return view('admin.coupon_code',['model'=>$model]);
    }

    public function add_coupon()
    {
        return view('admin.addCoupon');
    }

    public function addCoupon(Request $request)
    {
        $model=new CouponCode;

        $request->validate([
            'coupon_name'=>'required|min:4',
            'coupon_code'=>'required|min:4|unique:coupon_codes',
            'coupon_value'=>'required|integer'
        ]);
        
        $coupon_name=$request->coupon_name;
        $coupon_code=$request->coupon_code;
        $coupon_value=$request->coupon_value;
        $status=1;

        $model->coupon_name=$coupon_name;
        $model->coupon_code=$coupon_code;
        $model->coupon_value=$coupon_value;
        $model->coupon_status=$status;

        $model->save();

        return redirect()->route('coupon_code');
    }


    public function coupon_status($status,$id)
    {
        $model=CouponCode::find($id);
        $model->coupon_status=$status;
        $model->save();

        return redirect()->route('coupon_code');
    }

    public function update_coupon($id)
    {
        $model=CouponCode::find($id);
        return view('admin.updateCoupon',['CouponCode'=>$model]);
    }

    public function updateCoupon(Request $request,$id)
    {  
        $model=CouponCode::find($id);

        $request->validate([
            'coupon_name'=>'required|min:4',
            'coupon_code'=>'required|min:4',
            'coupon_value'=>'required|integer'
        ]);
        
        $coupon_name=$request->coupon_name;
        $coupon_code=$request->coupon_code;
        $coupon_value=$request->coupon_value;
        $status=1;

        $model->coupon_name=$coupon_name;
        $model->coupon_code=$coupon_code;
        $model->coupon_value=$coupon_value;
        $model->coupon_status=$status;

        $model->save();

        return redirect()->route('coupon_code');
    }

    public function delete_coupon($id)
    {
        CouponCode::destroy($id);

        return redirect()->back();
    }

    public function apply_coupon(Request $request)
    {
        $coupon='';
        $coupon=CouponCode::where('coupon_code',$request->couponCode)->first();
        
        if(!empty($coupon)){
            $status=$coupon->coupon_status;
            if($status==1){
                $couponPrice=$coupon->coupon_value;
                session()->flash('message','Your Coupon Apply Successfully!!');
                session()->flash('data', $couponPrice);
            }
            else{
                $couponPrice=0;
                session()->flash('message','Coupon Time Limit End');
            }
        }
        else{
            $couponPrice=0;
            session()->flash('message','Please Enter Valid Coupon');
        }

       /*  return $couponPrice; */
       return redirect()->route('cardData')/* ->with(['data' => $couponPrice]) */;
    }

   
}
