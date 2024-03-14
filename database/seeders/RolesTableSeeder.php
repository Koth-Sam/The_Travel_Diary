<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role1 = new Role();
        $role1->role_name= 'Admin';
        $role1->save();

        $role1->users()->attach(1);
        $role1->users()->attach(3);

        $roles= Role::factory()->count(20)->create();

        User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(1, 10)->pluck('id')->toArray()
            );
        });

    }
}
