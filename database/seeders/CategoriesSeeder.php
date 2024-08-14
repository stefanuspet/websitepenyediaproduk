<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert(
            [
                [
                    'category_name' => "Kecantikan",
                ],
                [
                    'category_name' => "Kesehatan",
                ],
                [
                    'category_name' => "Kebutuhan Harian",
                ],
            ]
        );
    }
}
