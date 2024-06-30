<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  RegisterUserRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            User::NAME => $request->name,
            User::EMAIL => $request->email,
            User::PASSWORD => Hash::make($request->password),
        ]);

        if ($user) {
            return response()->json([
                'message' => 'User registered successfully',
                'status' => 200,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'User registration failed',
                'status' => 400
            ], 400);
        }
    }

    /**
     * Authenticate user and generate access token.
     *
     * @param  LoginUserRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginUserRequest $request)
    {
        try {
            if (Auth::attempt($request->only(USER::EMAIL, USER::PASSWORD))) {
                $user = Auth::user();
                $token = $user->createToken('AppNameToken')->accessToken;
                return response()->json(['token' => $token], 200);
            }

            // Authentication failed
            return response()->json(['message' => 'Unauthorized'], 401);
        } catch (\Throwable $th) {
            logger($th);
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    /**
     * Revoke user's access token to logout.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out', 'status' => 200]);
    }
}
