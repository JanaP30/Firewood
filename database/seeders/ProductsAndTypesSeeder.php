<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;

use Illuminate\Database\Seeder;

class ProductsAndTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ['Chopped', 'Whole'];
        $productTypes = ['Beech', 'Oak', 'Rosewood', 'Birch'];

        foreach($productTypes as $productName){
            
            $productType = ProductType::firstOrCreate([
                'name' => $productName
            ]);
            
            $name = $products[rand(0,1)];

            $product = Product::firstOrCreate([
                
                'name' => $products[rand(0,1)],
            ]);


            echo ($product->name . "\n");
            echo ($productType->name . "\n");
            echo ('----' . "\n");
            $product->types()->attach($productType);
            $product->pivot->quantity = 1000;
            $product->pivot->save();
            
        }

       
    }

}
