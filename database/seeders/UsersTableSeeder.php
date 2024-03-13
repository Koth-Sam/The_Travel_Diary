<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user1 = new User();
        $user1->name = 'Thara Sam';
        $user1->email = 'thara@example.com';
        $user1->email_verified_at = now();
        $user1->password = Hash::make('password');
        $user1->remember_token = Str::random(10);
        $user1->save();

        User::factory()->count(30)->create();
    }

    
}
