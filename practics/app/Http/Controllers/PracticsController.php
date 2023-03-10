<?php

namespace App\Http\Controllers;

use App\Models\Practics;
use Illuminate\Http\Request;

class PracticsController extends Controller
{
    public function index()
    {
        return view('getdata');
    }
    public function savedata(Request $request)
    {
        $model = new Practics;
        $model->name=$request->name;

        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $ext=$image->getClientOriginalExtension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }
        /* 
        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }
        */
        $model->save();
        return "You are success";
    }
    public function showimage(){
        $model=Practics::find(13);
        /* echo "<pre>";
        print_r($model);
        die();  1676903563.jpg */
        return view('showimage',['data'=>$model]);
    }
   
}
