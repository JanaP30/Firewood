<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthServiceResponse {


    public $errors;
    public $data;


    public function __construct($errors, $data){
        $this->errors = $errors;
        $this->data = $data;
    }
}
    class AuthService{


        public static function validateLogin($email, $password){
            $errors = null;
            $data = [];

            try {

                $validLogin = Auth::attempt(['email' => $email, 'password' => $password]);
                if(!$validLogin){
                    return new AuthServiceResponse(['Invalid credentials'], $data);
                }


                $data['success'] = true;

            } catch (Exception $e) {
                Log::error('Failed to validate login.Error:'. $e);
                $errors[] = 'Failed to validate login.Please contact support';
            }
           
    
            
            return new AuthServiceResponse($errors, $data);
        }

            
            public static function createRegister(Request $request, $data){
            
            $attr = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|confirmed||min:6|[^a-zA-Z0-9 -]'
            ]);
    
            $user = User::create([
                'name' => $attr['name'],
                'password' => bcrypt($attr['password']),
                'email' => $attr['email']
            ]);
    
        return new AuthServiceResponse(true, [], $data);
       
        
    }

    }
