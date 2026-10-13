<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $credentials = $request->only("email", "password");
        $token = auth('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized access',
            ], 401);
        }
        return response(["access_token" => $token, "expires_in" => auth('api')->factory()->getTTL() * 60]);
    }
    public function me(Request $request)
    {
        $user = auth('api')->user();
        return response()->json($user);

    }
    public function logout()
    {
        auth('api')->logout(true);
        return response()->json([
            'message' => 'logged out successfully'
        ]);
    }
    public function refresh()
    {
        $refreshedToken = auth('api')->refresh();
        return response()->json([
            'refresh_token' => $refreshedToken,
            "expires_in" => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
