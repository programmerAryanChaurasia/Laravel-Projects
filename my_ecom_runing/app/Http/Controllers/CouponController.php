<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {   
        $data = Coupon::all();
        return view('admin.coupon',['data'=>$data]);
    }

    public function manage_coupon($id='')//id ka default value null diya h because manage category page par error nahi aaye.
    {
        if($id>0){
            $arr = Coupon::where(['id'=>$id])->get();
            $result['title']=$arr['0']->title;
            $result['code']=$arr['0']->code;
            $result['value']=$arr['0']->value;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['title']='';
            $result['code']='';
            $result['value']='';
            $result['id']='';//here value of id is null
        }
        /*  echo '<pre>';
        print_r($result['coupom_name']);
        die(); */ 
        return view('admin.manage_coupon',$result);
    }

    public function manage_coupon_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            'code' => 'unique:coupons|max:255',  
        ]);
        if($request->id>0){
            $model = Coupon::find($request->id); 
            $model->title = $request->title;
            $model->code = $request->code;
            $model->value = $request->value;
            $model->status = 1;
            $model->save();
            
            session()->flash('message','Coupon Data Updated Success fully!!');
            return redirect()->route('coupon');
        }
        else{          
            $model = new Coupon;
            $model->title = $request->title;
            $model->code = $request->code;
            $model->value = $request->value;
            $model->status = 1;
            $model->save();

            session()->flash('message','Coupon Data Inserted Success fully!!');
            return redirect()->route('manage.coupon');
        }        
    /*     $model->category_name = $request->category_name;
        $model->category_slug = $request->category_slug;
        $model->save();
       
        return redirect()->route('manage.category'); */
    }
    
    public function delete(Request $request,$id)
    {
        Coupon::destroy($id);
        session()->flash('message','Coupon Deteted Successfully');
        return redirect()->route('coupon');
        
    } 
    public function status(Request $request,$status,$id)
    {
        $model = Coupon::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','coupon Status Updated!!');
        return redirect()->route('coupon');

      
    } 
}
