<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $comment1 = new Comment();
        $comment1->comment = 'Beautiful location';
        $comment1->post_id = 1;
        $comment1->user_id = 1;
       // $comment1->parent_comment_id = ;
        $comment1->save();

        Comment::factory()->count(20)->create();
    }
}
