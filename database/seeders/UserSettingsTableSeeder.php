<?php

namespace Database\Seeders;

use App\Models\UserSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $setting1 = new UserSetting();
        $setting1->display_name = 'ThaRa Swansea';
        $setting1->notification_preference = 1;
        $setting1->user_id = 1;
        $setting1->theme = 'Theme 1';
        $setting1->save();

        UserSetting::factory()->count(20)->create();
    }
}
