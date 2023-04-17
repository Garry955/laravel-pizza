<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Arr::pluck(Category::get('id')->toArray(), 'id');
        for ($i = 0; $i < 99; $i++) {
            DB::table('products')->insert([
                'name' => Str::random(10) . '-pizza',
                'price' => rand(1000, 5000),
                'category_id' => Arr::random(($categories)),
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ]);
        }
    }
}
