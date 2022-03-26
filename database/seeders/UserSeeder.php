<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create()->each(function ($user)
        {
            $role = Role::where('name', '<>', UserType::SUPER_ADMIN)->where('name', '<>', UserType::ADMIN)->get()->random();
            $user->assignRole($role);
        });
    }
}
