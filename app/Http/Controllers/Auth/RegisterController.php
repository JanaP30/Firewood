<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\AuthService;
use App\Repositories\Auth\LoginService;

class RegisterController extends Controller

{

    public function createRegister($attr, $user)
    {
        $response = AuthService::createRegister($attr, $user);
        if(!$response->success){
            return back()->withErrors(['Failed ']);
        }

        $data = [
            'name'=> $response->data['name'],
            'email'=> $response->data['email'],
            'password'=> $response->data['password'],
            
        ];
        return view('register', $data);
    }










/*public function __construct()
{
    parent::__construct();
  
}

public function register(Request $request)
{
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

    return $this->success([
        'You registration is successfully'
    ]);
}
*/



}