<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('categories')->insert([
                'name' => "category-$i",
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ]);
        }
    }
}
