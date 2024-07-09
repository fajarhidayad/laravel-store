<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => 'required|email',
            "password" => 'required',
        ]);

        if (!Auth::guard('admin')->attempt($data)) {
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
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            "message" => "Success"
        ]);
    }

    public function profile(Request $request)
    {
        return Auth::guard('admin')->user();
    }
}
