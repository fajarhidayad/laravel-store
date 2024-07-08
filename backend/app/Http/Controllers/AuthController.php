<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            "name" => 'required|max:255',
            "email" => 'required|email|unique:users',
            "password" => 'required|confirmed|min:6',
        ]);

        $user = User::create($fields);

        Auth::login($user);

        return response()->json([
            "status" => "success"
        ], 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => 'required|email',
            "password" => 'required',
        ]);

        if (!Auth::attempt($data)) {
            return response()->json([
                "status" => "error",
                "message" => "Invalid credentials"
            ], 400);
        }

        $request->session()->regenerate();

        return response()->json([
            "status" => "success"
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            "message" => "Success"
        ]);
    }
}
