<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        $this->call([
            RoleAndPermissionSeeder::class,
            BrandSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PrioritySeeder::class,
            StatusSeeder::class,
            CustomerSeeder::class,
            TicketSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
