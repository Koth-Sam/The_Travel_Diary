<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tag1 = new Tag();
        $tag1->tag_name= 'Parks';
        $tag1->save();

        $tag2 = new Tag();
        $tag2->tag_name= 'Waterfalls';
        $tag2->save();

        $tag1->posts()->attach(2);
        $tag1->posts()->attach(3);

        $tag2->posts()->attach(3);

        $tags= Tag::factory()->count(20)->create();

        Post::all()->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(1, 10)->pluck('id')->toArray()
            );
        });
        
    }
}
