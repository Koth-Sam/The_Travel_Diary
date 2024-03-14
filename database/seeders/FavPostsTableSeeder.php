<?php

namespace Database\Seeders;

use App\Models\FavPost;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $post1 = new FavPost();
        $post1->save();

        $post1->users()->attach(1);
        $post1->users()->attach(8);

        $post= FavPost::factory()->count(10)->create();

        User::all()->each(function ($user) use ($post) {
            $user->fav_posts()->attach(
                $post->random(1, 10)->pluck('id')->toArray()
            );
        });
    }
}
