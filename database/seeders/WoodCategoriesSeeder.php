<?php

namespace Database\Seeders;

use App\Models\WoodCategory;
use Illuminate\Database\Seeder;

class WoodCategoriesSeeder extends Seeder
{
    public function run()
    {
        $woodCategories = ['Chopped', 'Whole'];

        foreach($woodCategories as $name){
            
            WoodCategory::firstOrCreate([
                'name' => $name
            ]);
            
        }

    }
}
