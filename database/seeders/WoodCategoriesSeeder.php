<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class WoodCategoriesSeeder extends Seeder
{
    public function run()
    {
        $woodCategories = ['Chopped', 'Whole'];

        foreach($woodCategories as $name){
            
            Category::firstOrCreate([
                'name' => $name
            ]);
            
        }

    }
}
