<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (!Auth::attempt($credentials)) {
                return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
            }

            $user = User::where('email', $request->email)->first();
            $user->tokens()->delete();
            $token = $user->createToken($user->role . '-token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'token' => $token,
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json(['status' => 'success', 'message' => 'Logged out']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Logout failed'], 500);
        }
    }

    public function me(Request $request)
    {
        try {
            $user = $request->user();
            return response()->json([
                'status' => 'success',
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to fetch user'], 500);
        }
    }
}
