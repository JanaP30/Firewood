<?php

namespace App\Http\Controllers\API\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller

{


    public function register(RegisterRequest $request){
        $input = $request->input();
        $name = $input['name'];
        $email = $input['email'];
        $password = $input['password'];

        $response = AuthService::registerNewUser($email, $name, $password);
        if($response->errors){
            return response()->json($response->errors, 422);
        }
        return response()->json($response->data, 200);
                                                                  
    } 


    public function createLogin(LoginRequest $request){

        $input = $request->input();
        $email = $input['email'];
        $password = $input['password'];

        $response = AuthService::validateLogin($email, $password);
        if($response->errors){
            return response()->json($response->errors, 422);
        }
        return response()->json($response->data, 200);
} 

}












