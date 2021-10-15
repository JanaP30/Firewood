<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Type;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productType = ['Beech', 'Oak', 'Rosewood', 'Birch'];

        foreach($productType as $name){
            // $type = TypeOfWood::where('name', $name)->first();

            // if(!$type){
            //     TypeOfWood::create([
            //         'name' => $name
            //     ]);
            // }
            ProductType::firstOrCreate([
                'name' => $name,
                'quantity' => 1000
                
            ]);
            
        }

    }

   
}
