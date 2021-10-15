<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = ['Chopped', 'Whole'];

        foreach($products as $name){
            
            Product::firstOrCreate([
                'name' => $name
            ]);
            
        }

    }
    
}

