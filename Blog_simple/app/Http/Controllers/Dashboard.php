<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Dashboard extends Controller
{
    public function show_post(){
        $post=post::all();
        return view('dashboard',['posts'=>$post]);
    }
}
