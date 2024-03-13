<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $post1 = new Post();
        $post1->title = 'Weekend Getaway to National Park';
        $post1->content = 'This is s post about another beautiful national park in my country';
        $post1->user_id = 1;
        $post1->save();

        Post::factory()->count(20)->create();
    }
}
