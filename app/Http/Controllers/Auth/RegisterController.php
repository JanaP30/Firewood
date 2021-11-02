<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Auth\AuthService;
use App\Repositories\Auth\LoginService;

class RegisterController extends Controller

{

    public function createRegister(RegisterRequest $request)
    {
        $input = $request->input();
        $name = $input['name'];
        $email = $input['email'];
        $password = $input['password'];

        $response = AuthService::registerNewUser($email, $name, $password);

        if($response->errors){
            return back()->withErrors($response->errors);
        }

        return redirect('/');
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