<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Holidays',
                'slug' => 'holidays',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Camping',
                'slug' => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Work',
                'slug' => 'work',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
