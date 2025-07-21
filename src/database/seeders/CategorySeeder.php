<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['contents' => '商品のお届けについて'],
            ['contents' => '商品の交換について'],
            ['contents' => '商品トラブル'],
            ['contents' => 'ショップへのお問い合わせ'],
            ['contents' => 'その他'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}