<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Iphone X',
            'price' => 10000,
            'category' => 'Mobiles',
            'image' => 'https://www.imore.com/sites/imore.com/files/styles/large_wm_brw/public/field/image/2021/05/iphone-12-mini-purple-back-hero.jpg',
        ]);
    }
}
