<?php

namespace Database\Seeders;

use App\Models\Tag;
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

        $tag1->posts()->attach(1);
        $tag1->posts()->attach(5);

        $tag2->posts()->attach(8);

    }
}
