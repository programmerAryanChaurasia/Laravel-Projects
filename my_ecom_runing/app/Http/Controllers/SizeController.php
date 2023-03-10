<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    
    public function index()
    {   
        $data = size::all();
        return view('admin.size',['data'=>$data]);
    }

    public function manage_size($id='')//id ka default value null diya h because manage size page par error nahi aaye.
    {
        if($id>0){
            $arr = size::where(['id'=>$id])->get();
            $result['size']=$arr['0']->size;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['size']='';
            $result['status']='';
            $result['id']='';//here value of id is null
        }
        /*  echo '<pre>';
        print_r($result['size_name']);
        die(); */ 
        return view('admin.manage_size',$result);
    }

    public function manage_size_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            'size' => 'unique:sizes|max:255',  
        ]);
        if($request->id>0){
            $model = size::find($request->id); 
            $model->size = $request->size;
            $model->status = $request->status;
            $model->status = 1;
            $model->save();
            
            session()->flash('message','Data Updated Success fully!!');
            return redirect()->route('size');
        }
        else{          
            $model = new size;
            $model->size = $request->size;
            $model->status = $request->status;
            $model->status = 1;
            $model->save();

            session()->flash('message','Size Inserted Success fully!!');
            return redirect()->route('manage.size');
        }        
    }
    
    public function delete(Request $request,$id)
    {
        size::destroy($id);
        session()->flash('message','Data Deteted Successfully');
        return redirect()->route('size');
        
    } 
    public function status(Request $request,$status,$id)
    {
        $model = size::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','size Status Updated!!');
        return redirect()->route('size');

      
    } 
}
