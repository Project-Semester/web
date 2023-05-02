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
            'email' => 'author@gmail.com',
            'password' => bcrypt('Author123!'),
        ]);
    }
}
