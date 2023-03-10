<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactList()
    {
        $contact=DB::table('contact_us')->get();
        return view('admin.contact',['contactData'=>$contact]);
    }

}
