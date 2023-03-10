<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Blog;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())// Retrieve the currently authenticated user's ID...
        {
            if(Auth::user()->usertype=='0') // Auth::user() Retrieve the currently authenticated user..
            {
                $model=Doctor::all();
                return view('user.home',['data'=>$model]);
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index()
    {
        if(Auth::id())// Retrieve the currently authenticated user's ID...
        {
            return redirect('home');
        }
        else 
        {
            $model=Doctor::all();
            return view('user.home',['data'=>$model]);
        }
    }
  
     public function appointment(Request $request)
     {
        /* dd($request);
        echo "<pre>";
        print_r($request);
        die();  */
        $model=new Appointment;
        
        $model->name = $request->name ;
        $model->email = $request->email ;
        $model->phone = $request->phone ;
        $model->doctor = $request->doctor ;
        $model->date = $request->date ;
        $model->message = $request->message ;
        $model->status = 'In Progress';
        if(Auth::id()){
            $model->user_id = Auth::id();/* user()->id() */
        }
        $model->save();

        session()->flash('message',"Your Appointment Booked Successfully!!");
        return redirect()->back();
    }
    public function my_appoinment()
    {
        if(Auth::id()){
            $appoint=Appointment::where('user_id',Auth::id())->get();
            return view('user.my_appoinment',['appoint'=>$appoint]);
        }
        else{
            return redirect()->back();
        }
    }
    public function cancleAppoinment($id)
    {
        Appointment::destroy($id);
        session()->flash('message',"Your Appointment Deleted Successfully!!");
        return redirect()->back();
    }
    public function blogs(Request $request)
    {
        $model=new Blog;

        if($request->hasFile('publisherImage'))
        {
            $image=$request->publisherImage;
            $ext=$image->extension();
            $imageName=time().'.'.$ext;
            $request->publisherImage->move('DoctorImage',$imageName);
            $model->publisherImage=$imageName;
            
        }
        else{
           $model->publisherImage="img";
          
        }

        if($request->hasFile('thumbnil')){
           
            $image=$request->thumbnil;
            $ext=$image->extension();
            $imageName=time().'.'.$ext;
            $request->thumbnil->move('DoctorImage',$imageName);
            $model->thumbnil=$imageName;
        }
        else{
            $model->thumbnil="img";
        }

        $model->category =$request->category;
        $model->title =$request->title;
        $model->date =$request->date;
        $model->news =$request->news;

        $model->save();
        return redirect()->back();
    }
    public function show_blog()
    {
        return view('user.blog');
    }
}
