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

            
        public static function registerNewUser($email, $name, $password){
            
            $errors = null;
            $data = [];

            try {

                $emilExists = AuthRepository::getUserByEmail($email);
                if($emilExists){
                    return new AuthServiceResponse(['Please choose another email'], $data);
                }

                $nameExists = AuthRepository::getUserByName($name);
                if($nameExists){
                    return new AuthServiceResponse(['Please choose another name'], $data);
                }

                throw new Exception('Namjerni error');

                $user = User::create([
                    'email' => $email,
                    'name' => $name,
                    'password' => bcrypt($password)
                ]);


                $data['user'] = $user;

            } catch (Exception $e) {
                Log::error('Failed to register.Error:'. $e);
                $errors[] = 'Failed to register.Please contact support';
            }
           
    
            
            return new AuthServiceResponse($errors, $data);
       
        
        }

    }
