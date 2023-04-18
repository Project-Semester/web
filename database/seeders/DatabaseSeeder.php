<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();
        User::factory()->create([
            'username' => 'author',
            'email' => 'author@gmail.com',
            'password' => 'Author123!',
        ]);
        Category::factory(4)->create();
        Story::factory(20)->create();
        Comment::factory(15)->create();

        $comments = Comment::all();
        Story::all()->each(function ($story) use ($comments) {
            $story->comments()->saveMany($comments);
        });
    }
}
