<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(4)->create();
        User::factory()->create([
            'username' => 'author',
            'role' => 'author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('Author123!'),
        ]);
        User::factory()->create([
            'username' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin1234!'),
        ]);
    }
}
