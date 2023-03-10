<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;

class AdminController extends Controller
{
    public function users()
   {
    $data=User::all();
    return view('admin.users',['data'=>$data]);
   }

   public function delete_user($id)
   {
    User::destroy($id);
    return redirect()->back();
   }

   public function food_menu()
   {    
        $food=Food::all();
        return view('admin.food_menu',['food'=>$food]);
   }
   public function add_food(Request $request)
   {
        $model=new Food;

        $image=$request->image;
        $ext=$image->extension();
        $imageName=time().'.'.$ext;
        $request->image->move('Food_Image',$imageName);
        $model->image=$imageName;

        $model->title=$request->title;
        $model->price=$request->price;
        $model->description=$request->description;
        $model->save();

        session()->flash('message','Data insserted Successfully!!');
        return redirect()->back();
   }
   public function update_food($id)
   {
        $food=Food::find($id);
        return view('admin.update_food',['food'=>$food]);
   }
   public function updateFood(Request $request)
   { 
    $model=Food::find($request->hiddenId);
   if($request->hasFile('image')){
        $image=$request->image;
        $ext=$image->extension();
        $imageName=time().'.'.$ext;
        $request->image->move('Food_Image',$imageName);
        $model->image=$imageName;
    }
    else{
        $model->image="img";
    }

    $model->title=$request->title;
    $model->price=$request->price;
    $model->description=$request->description;
    $model->save();

    session()->flash('message','Data insserted Successfully!!');
    return redirect()->back();
    
   }

   public function show_reservation()
   {
          $model=Reservation::all();
          return view('admin.show_reservation',['model'=>$model]);
   }

   public function delete_reservation($id)
   {
     Reservation::destroy($id);
     session('message','Data Deleted successfully!!');
     return redirect()->back();
   }

   public function chef()
   {
          $chefdata=Chef::all();
          return view('admin.chef',['chefdata'=>$chefdata]);
   }
   /*        $table->string('name')->nullable();
            $table->string('chefImg')->nullable();
            $table->string('speciality')->nullable(); */
   public function add_chef(Request $request)
   {
          $model=new Chef;

          $request->validate([
               'name'=>'required|max:255',
               'speciality'=>'required|max:255',
               
          ]);
          
          if($request->hasfile('chefImg'))
          {
               
               $image=$request->chefImg;
               $ext=$image->extension();
               $imageName=time().'.'.$ext;
               $request->chefImg->move('chefImg',$imageName);
               $model->chefImg=$imageName;
          }

          $model->name=$request->name;
          $model->speciality=$request->speciality;
          $model->save();

          session()->flash('message','Data insserted Successfully!!');
          return redirect()->back();
   }

   public function delete_chef($id)
   {
          Chef::destroy($id);
          session()->flash('message','Chef Data Deleted Successfully!!');
          return redirect()->back();
   }

   public function update_chef(Request $request)
   {
          $model=Chef::find($request->id);

          return view('admin.update_chef',['chefData'=>$model]);
   }

   public function update_chef_data(Request $request, $id)
   {
          $model=Chef::find($id);
          
         /*  $request->validate([
               'name'=>'required|max:255',
               'speciality'=>'required|max:255',
               
          ]); */
          
          if($request->hasfile('chefImg'))
          {
               $image=$request->chefImg;
               $ext=$image->extension();
               $imageName=time().'.'.$ext;
               $request->chefImg->move('chefImg',$imageName);
               $model->chefImg=$imageName;
          }

          $model->name=$request->name;
          $model->speciality=$request->speciality;
          $model->save();

          $chefdata=Chef::all();/* ['chefdata'=>$chefdata] */
          session()->flash('message','Data Updated Successfully!!');
          return redirect()->route('chef');
   }
}
