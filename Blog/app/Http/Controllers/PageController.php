<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pageList()
    {
         $pageData=DB::table('pages')->orderBy('id','desc')->get();
         return view('admin.page.list',['pageData'=>$pageData]);
    }
 
    public function pageEdit($id)
    {      /* return $id; */
           $result=DB::table('pages')->where('id',$id)->get();
           /* echo "<pre>";
           print_r($result[0]->id);
           die(); */
           return view('admin.page.edit',['pageData'=>$result]);
    }
 
    public function pageAdd()
    {
         return view('admin.page.add');
    }
 
    public function pageSubmit(Request $request)
    {
         $request->validate([
             'name'=>'required',
             'slug'=>'required|unique:pages',
             'description'=>'required',
         
         ]);
 
         $name=$request->name;
         $slug=$request->slug;
         $description=$request->description;
         $date=$request->page_date;
 
         DB::table('pages')->insert([
             'name'=>$name,
             'slug'=>$slug,
             'description'=>$description,
             'status'=>1,
             'added_on'=>date('Y-m-d h:i:s'),
         ]);
         session()->flash('message','Data Inserted SuccessFully!!');
         return redirect('admin/page/list');
         
    }
    public function pageDelete($id)
    {
         DB::table('pages')->where('id','=',$id)->delete();
         return redirect()->back();
    }
 
    public function pageStatus($status, $id)
    {
         DB::table('pages')->where('id','=',$id)->update(['status'=>$status]);
         session()->flash('message','page Status SuccessFully!!');
         return redirect('admin/page/list');
    }
 
    public function pageUpdate(Request $request ,$id)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:pages',
            'description'=>'required',
        
        ]);
 
         $name=$request->name;
         $slug=$request->slug;
         $description=$request->description;
         $date=$request->page_date;
 
        DB::table('pages')->where('id','=',$id)->update([
            'name'=>$name,
             'slug'=>$slug,
             'description'=>$description,
             'status'=>1,
             'added_on'=>$date,
        ]);
        session()->flash('message','Data Updated SuccessFully!!');
        return redirect('admin/page/list');
    }
}
