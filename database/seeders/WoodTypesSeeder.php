<?php

namespace Database\Seeders;

use App\Models\TypeOfWood;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Type;

class WoodTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $woodTypes = ['Beech', 'Oak', 'Rosewood', 'Birch'];

        foreach($woodTypes as $name){
            // $type = TypeOfWood::where('name', $name)->first();

            // if(!$type){
            //     TypeOfWood::create([
            //         'name' => $name
            //     ]);
            // }
            TypeOfWood::firstOrCreate([
                'name' => $name
            ]);
            
        }

    }
}
