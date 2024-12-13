<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->authService->register($request->validated());
        return response()->json([
            'message' => 'User registered successfully!',
            'user' => $user
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $token = $this->authService->login($request->validated());

        if ($token) {
            return response()->json([
                'token' => $token,
                'user' => $request->user()
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }


    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    public function logout(Request $request) {
        $this->authService->logout($request->user());
        
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
