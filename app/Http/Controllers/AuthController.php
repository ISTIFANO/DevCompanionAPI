<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\RoleRepositery;
use App\Repository\UserRepositery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(protected UserRepositery $user_repositery, protected RoleRepositery $role_repositery) {}


    public function Login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $data = $request->only('email', 'password');
        $token = Auth::attempt($data);
        if (!$token) {

            return ['error' => 'email ou password not valide '];
        }

        $user = Auth::user();
        return response()->json(["message" => "login succ", "user" => $user, "token" => $token]);
    }
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'logged out',
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'phone' => 'required|string',
            'image' => 'required|string',
            'role' => 'required|string',
        ]);
        $data = $request->all();
        $role = $this->role_repositery->findbyName($request->role);

        $user = $this->user_repositery->register($data, $role);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token          ]
        ]);
    }
}
