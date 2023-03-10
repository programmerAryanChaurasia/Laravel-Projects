<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Category::all();
        return view('admin.category',['data'=>$data]);
    }

    public function manage_category($id='')//id ka default value null diya h because manage category page par error nahi aaye.
    {
        if($id>0){
            $arr = Category::where(['id'=>$id])->get();
            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['id']='';//here value of id is null
        }
        /*  echo '<pre>';
        print_r($result['category_name']);
        die(); */ 
        return view('admin.manage_category',$result);
    }

    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_slug' => 'unique:categories|max:255',  
        ]);
        if($request->id>0){
            $model = Category::find($request->id); 
            $model->category_name = $request->category_name;
            $model->category_slug = $request->category_slug;
            $model->status = 1;
            $model->save();
            
            session()->flash('message','Data Updated Success fully!!');
            return redirect()->route('category');
        }
        else{          
            $model = new Category;
            $model->category_name = $request->category_name;
            $model->category_slug = $request->category_slug;
            $model->status = 1;
            $model->save();

            session()->flash('message','Data Inserted Success fully!!');
            return redirect()->route('manage.category');
        }        
    }
    
    public function delete(Request $request,$id)
    {
        Category::destroy($id);
        session()->flash('message','Data Deteted Successfully');
        return redirect()->route('category');
        
    } 
    public function status(Request $request,$status,$id)
    {
        $model = Category::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Category Status Updated!!');
        return redirect()->route('category');

      
    } 
     
}
