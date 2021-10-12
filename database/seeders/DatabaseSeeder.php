<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Database\Seeders\WoodTypesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(WoodTypesSeeder::class);
        $this->call(WoodCategoriesSeeder::class);
    }
}
