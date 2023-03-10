<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function postList()
   {
        $postData=DB::table('posts')->orderBy('id','desc')->get();
        return view('admin.post.list',['postData'=>$postData]);
   }

   public function postEdit($id)
   {      /* return $id; */
          $result=DB::table('posts')->where('id',$id)->get();
          /* echo "<pre>";
          print_r($result[0]->id);
          die(); */
          return view('admin.post.edit',['postData'=>$result]);
   }

   public function postAdd()
   {
        return view('admin.post.add');
   }

   public function postSubmit(Request $request)
   {
        $request->validate([
            'title'=>'required|string|max:100',
            'short_desc'=>'required|string|max:100',
            'long_desc'=>'required',
            'post_date'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
        ]);

        $title=$request->title;
        $shortDesc=$request->short_desc;
        $longDesc=$request->long_desc;
        $date=$request->post_date;

        if($request->hasFile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $imageName=time().'.'.$ext;
            $request->image->move('PostImage',$imageName);

        }

        DB::table('posts')->insert([
            'title'=>$title,
            'short_desc'=>$shortDesc,
            'long_desc'=>$longDesc,
            'post_date'=>$date,
            'image'=>$imageName,
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s'),
        ]);
        session()->flash('message','Data Inserted SuccessFully!!');
        return redirect('admin/post/list');
        
   }
   public function postDelete($id)
   {
        DB::table('posts')->where('id','=',$id)->delete();
        return redirect()->back();
   }

   public function postStatus($status, $id)
   {
        DB::table('posts')->where('id','=',$id)->update(['status'=>$status]);
        session()->flash('message','Post Status SuccessFully!!');
        return redirect('admin/post/list');
   }

   public function postUpdate(Request $request ,$id)
   {
     $request->validate([
          'title'=>'required|string|max:100',
          'short_desc'=>'required|string|max:100',
          'long_desc'=>'required',
          'post_date'=>'required',
          'image'=>'mimes:jpg,jpeg,png',
      ]);

      $title=$request->title;
      $shortDesc=$request->short_desc;
      $longDesc=$request->long_desc;
      $date=$request->post_date;

      if($request->hasFile('image')){
          $image=$request->file('image');
          $ext=$image->extension();
          $imageName=time().'.'.$ext;
          $request->image->move('PostImage',$imageName);
      }
      else{
          $imageName="img";
      }
          DB::table('posts')->where('id','=',$id)->update([
               'title'=>$title,
               'short_desc'=>$shortDesc,
               'long_desc'=>$longDesc,
               'post_date'=>$date,
               'image'=>$imageName,
               'status'=>1,
               'added_on'=>date('Y-m-d h:i:s'),
          ]);
          session()->flash('message','Data Updated SuccessFully!!');
          return redirect('admin/post/list');
   }
}
