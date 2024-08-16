<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)
            ->create();

        $posts = Post::factory(100)
            ->recycle($users)
            ->create();

        $comments = Comment::factory(200)
            ->recycle($users)
            ->recycle($posts)
            ->create();

        $ayberk = User::factory()
            ->has(Post::factory(20))
            ->has(Comment::factory(100)->recycle($posts))
            ->create([
            'name' => 'Ayberk Ersoy',
            'email' => 'test@example.com',
        ]);
    }
}
