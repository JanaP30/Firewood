<?php

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\Auth\AuthService;


class LoginController extends Controller {

    public function __construct(){
        parent::__construct();
     
    }


    public function createLogin(LoginRequest $request)
    {

        $input = $request->input();
        $email = $input['email'];
        $password = $input['password'];


        $response = AuthService::validateLogin($email, $password);
        if($response->errors){
            return back()->withErrors($response->errors);
        }

        return redirect('/dashboard.show');
    }






















   /* public function login(Request $request){
        $attr = $request->validate([
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
        
    public function logout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }*/
  
}