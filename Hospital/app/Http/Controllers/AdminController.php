<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function add_doctor_view(){
        return view('admin.add_doctor');
    }
    public function add_doctor(Request $request)
    {
        $model=new Doctor;
        $model->name=$request->name;
        $model->phone=$request->phone;
        $model->room=$request->room;
        $model->speciality=$request->speciality;

        $imageName=time().'.'.$request->image->extension(); 
        $request->image->move('DoctorImage',$imageName);
        $model->doctorImg=$imageName;
       
        $model->save();
        session()->flash('message',"Data Inserted Successfully!!");
        return redirect()->back();
    }

    public function adminAppointment()
    {
        
            $appoint=Appointment::all();
            return view('admin.adminAppointment',['appoint'=>$appoint]); 
        
            /* return redirect()->back(); */
    }
    public function appoinmentStatus($id)/* "status":"In Progress" */
    {
        $appoint=Appointment::find($id);
        if($appoint->status=="In Progress"){
            $appoint->status="Cancle";
        }
        else{
            $appoint->status="In Progress";
        }
        $appoint->save();
        return redirect()->back();
    }
    public function admin_show_doctor()
    {
        $model=Doctor::all();
        return view('admin.admin_show_doctor',['doctor'=>$model]);
    }
    public function delete_doctor($id)
    {
        Doctor::destroy($id);
        session()->flash('message','Data Deleted successfully!!');
        return redirect()->back();
    }
   public function update_doctor_record($id)
   {
        $model=Doctor::find($id);
        return view('admin.update_doctor_record',['data'=>$model]);
   }
   public function change_doctor_data(Request $request,$id)
   {
        $model=Doctor::find($id);
        
        $model->name=$request->name;
        $model->phone=$request->phone;
        $model->room=$request->room;
        $model->speciality=$request->speciality;

        $image=$request->image;
        $ext=$image->extension();
        $imageName=time().'.'.$ext;
        $request->image->move('DoctorImage',$imageName);
        $model->doctorImg=$imageName;

        $model->save();
        return redirect()->back();
   }
   public function add_news()
   {
      return view('admin.add_news');
   }
}
