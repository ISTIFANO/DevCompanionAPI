<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
    }


    public function Login(Request $request){

        $request->validate(['email' => 'required|string',
            'password' => 'required|string']);

            $data = $request->only('email','password');
            $token = Auth::attempt($data);
            if(!$token){

                return ['error' => 'email ou password not valide '];
            }

            $user = Auth::user();
            return response()->json(["message"=>"login succ","user"=>$user,"token"=>$token]);
    }
    public function logout(){
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'logged out',
        ]);
    }

}
