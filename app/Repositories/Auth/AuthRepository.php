<?php

namespace App\Repositories\Auth;

use App\Models\User;

class AuthRepository
{
    public static function getUserByEmail($email){
       return User::where('email', $email)->first();
    }

    public static function getUserByName($name){
        return User::where('name', $name)->first();
     }

   
    
}