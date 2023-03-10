<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function home()
    {
         $postData=DB::table('posts')->orderBy('id','desc')->get();
         return view('fornt_end.home',['postData'=>$postData]);
    }

    public function post($id)
    {
        $postData=DB::table('posts')->where('id',$id)->get();
        /* echo "<pre>";
        print_r($postData[0]->id);
        die(); */
        return view('fornt_end.post',['postData'=>$postData]);
    }

    public static function page_menu()
    {
        $result=DB::table('pages')->where('status','1')->get();
        return $result;
    }

    public function page($id)
    {
        /* return $id; */
        $postData=DB::table('pages')->where('slug',$id)->get();
        /* return $postData; */
        return view('fornt_end.page',['postData'=>$postData]);
    }



}
