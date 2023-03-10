<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    
    public function index()
    {   
        $data = Color::all();
        return view('admin.color',['data'=>$data]);
    }

    public function manage_color($id='')//id ka default value null diya h because manage category page par error nahi aaye.
    {
        if($id>0){
            $arr = Color::where(['id'=>$id])->get();
            $result['color']=$arr['0']->color;
            /* $result['category_slug']=$arr['0']->category_slug; */
            $result['id']=$arr['0']->id;
        }
        else{
            $result['color']='';
            /* $result['category_slug']=''; */
            $result['id']='';//here value of id is null
        }
        /*  echo '<pre>';
        print_r($result['category_name']);
        die(); */ 
        return view('admin.manage_color',$result);
    }

    public function manage_color_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            'color' => 'unique:colors|max:255',  
        ]);
        if($request->id>0){
            $model = Color::find($request->id); 
            $model->color = $request->color;
            /* $model->category_slug = $request->category_slug; */
            $model->status = 1;
            $model->save();
            
            session()->flash('message','Color Updated Success fully!!');
            return redirect()->route('color');
        }
        else{          
            $model = new Color;
            $model->color = $request->color;
           /*  $model->category_slug = $request->category_slug; */
            $model->status = 1;
            $model->save();

            session()->flash('message','Color Inserted Success fully!!');
            return redirect()->route('manage.color');
        }        
    /*     $model->category_name = $request->category_name;
        $model->category_slug = $request->category_slug;
        $model->save();
       
        return redirect()->route('manage.category'); */
    }
    
    public function delete(Request $request,$id)
    {
        Color::destroy($id);
        session()->flash('message','Color Deteted Successfully');
        return redirect()->route('color');
        
    } 
    public function status(Request $request,$status,$id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Color Status Updated!!');
        return redirect()->route('color');

      
    } 
     
}
