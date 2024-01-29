<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller {
    protected $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = $this->authService->register($request->all());

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $token = $this->authService->login($request->only('email', 'password'));

        if ($token) {
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request) {
        $this->authService->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
