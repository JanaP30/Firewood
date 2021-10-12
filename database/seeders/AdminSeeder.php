<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUserExist = User::where('email', 'admin@admin.com')->first();


        if(!$adminUserExist){

                User::create([

                        'name'=>'admin',
                        'email'=>'admin@admin.com',
                        'password'=>Hash::make('123456'),
                        


                ]);
        }




}
}