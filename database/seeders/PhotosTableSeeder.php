<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $photo1 = new Photo();
        $photo1->file_name = 'Park_img1';
        $photo1->file_path = 'https://via.placeholder.com/tmp/309fd63646f6d781848850277c14aef2.png';
        $photo1->post_id = 1;
        $photo1->save();

       Photo::factory()->count(20)->create();
    }
}
