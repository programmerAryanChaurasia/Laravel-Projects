<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
     DB::table('products')->insert([
        [
            'name'=>"LG Mobile",
            'price'=>"23000",
            'description'=>"A Smart phone with 4GB ram and much more feature",
            'category'=>"mobile",
            'gattery'=>"https://i03.appmifile.com/74_operator_in/21/02/2023/8f5fb2b3cd2bbac66999c4b6a6f329ce.jpg?f=webp",
    
        ],
        [
            'name'=>"Samsung Mobile",
            'price'=>"56000",
            'description'=>"A Smart phone with 16GB ram and much more feature",
            'category'=>"mobile",
            'gattery'=>"https://i03.appmifile.com/67_operator_in/13/02/2023/fb0e448bd9f5040fb94cc0a12eb13592.jpg?f=webp",
    
        ],
        [
            'name'=>"MI Mobile",
            'price'=>"36000",
            'description'=>"A Smart phone with 8GB ram and much more feature",
            'category'=>"mobile",
            'gattery'=>"https://i03.appmifile.com/793_operator_in/15/02/2023/5c92dbc8960a7fa7a174ed388cd29b5b.jpg?f=webp",
    
        ],
        [
            'name'=>"LG Mobile",
            'price'=>"56900",
            'description'=>"A Smart phone with 16GB ram and much more feature",
            'category'=>"mobile",
            'gattery'=>"https://i03.appmifile.com/910_operator_in/17/02/2023/6c85667b4bbbe9dcc5944a454e823be2.jpg?f=webp",
    
        ],
        [
            'name'=>"Neo Qled 8k",
            'price'=>"17000",
            'description'=>"A Smart TV with 2GB ram and much more feature",
            'category'=>"tv",
            'gattery'=>"https://images.samsung.com/is/image/samsung/assets/in/home/0216/1440x640-QN800B1.jpg?imwidth=1366",
    
        ],
        [
            'name'=>"Samsung Mobile",
            'price'=>"23990",
            'description'=>"A Smart phone with 6GB ram and much more feature",
            'category'=>"Mobile",
            'gattery'=>"https://i03.appmifile.com/74_operator_in/21/02/2023/8f5fb2b3cd2bbac66999c4b6a6f329ce.jpg?f=webp",
    
        ],
        [
            'name'=>"Samsung Freeze",
            'price'=>"13000",
            'description'=>"A Smart Freeze with 1GB ram and much more feature",
            'category'=>"freeze",
            'gattery'=>"https://images.samsung.com/is/image/samsung/assets/in/home/0216/HKV_1440x640.jpg?imwidth=1366",
    
        ],
        [
            'name'=>"Galaxy Tab S6 Lite",
            'price'=>"40000",
            'description'=>"A Smart Tab with 8GB ram and much more feature",
            'category'=>"tab",
            'gattery'=>"https://images.samsung.com/is/image/samsung/p6pim/in/sm-p613nzbainu/gallery/in-galaxy-tab-s6-lite-p610-428695-sm-p613nzbainu-532944562?$1300_1038_PNG$",
    
        ],
        
     ]);
    }
}
/*  $table->string('name');
            $table->string('price');
            $table->string('category');
            $table->string('description');
            $table->string('gattery'); */

            