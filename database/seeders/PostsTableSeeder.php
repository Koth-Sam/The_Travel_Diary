<?php

namespace Database\Seeders;
use App\Models\Tag;
use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
        $post1->content = 'This is s post about another beautiful national park';
        $post1->user_id = 1;
        $post1->save();

        Post::factory()->count(20)->create();

     }
}


