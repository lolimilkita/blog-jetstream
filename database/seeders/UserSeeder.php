<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Catur Saputro',
            'email' => 'catur.ccd@gmail.com',
            'password' => bcrypt('rahasiabgt'),
        ]);
    }
}
