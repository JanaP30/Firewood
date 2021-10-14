<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;

use Illuminate\Database\Seeder;

class ProductAndTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ['Chopped', 'Whole'];
        $productType = ['Beech', 'Oak', 'Rosewood', 'Birch'];

        foreach($products as $name){
            
            Product::firstOrCreate([
                'name' => $name
            ]);
        

    
            ProductType::firstOrCreate([
               
            ]);
            
        }

    }
}
