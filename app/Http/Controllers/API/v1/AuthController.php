<?php

namespace App\Http\Controllers\API\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller

{


public function createRegister($attr, $user)
{
  
    $response = AuthService::createRegister($attr, $user);
        if(!$response->success){
            return back()->withErrors(['Failed']);
        }

        $data = [
            'name'=> $response->data['name'],
            'email'=> $response->data['email'],
            'password'=> $response->data['password'],
        ];
        response()->json($data);
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







    /* $attr = $request->validate([
        'email' => 'required|string|email|',
        'password' => 'required|string|min:6'
    ]);

    if (Auth::attempt($attr)) {
        $request->session()->regenerate();
        return redirect()->intended('home');
    } 
     return back()->withErrors([
            'email' => 'The provided attempt do not match our records.',
        ]);
    }
    
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
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

    /*
        Redirectati usera na success (obijezbijediti mu link na login)
    */

   /* return $this->success([
        'You registration is successfully'
    ]);
}
         
  
}












