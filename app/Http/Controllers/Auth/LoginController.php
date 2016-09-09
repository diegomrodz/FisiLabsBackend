<?php

namespace FisiLabs\Http\Controllers\Auth;

use Auth;

use Illuminate\Http\Request;
use FisiLabs\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function apiLogin(Request $request) 
    {
        if (Auth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ])) 
        {
            $user = Auth::user();

            $token = $user->createToken($user->email . ' personal token.')->accessToken;

            return [
                "user"  => $user,
                "token" => $token
            ];
        }
        
        return response()->json("Error", 500);
    }

    public function redirectPath() 
    {
        $user = Auth::user();

        return "/$user->type";
    }
}
