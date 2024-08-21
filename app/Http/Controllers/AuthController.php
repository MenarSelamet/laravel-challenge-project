<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create(RegisterRequest $request): JsonResponse
    {
        $input = $request->validated();
        $user = User::create($input);

        return response()->json([
            'message' => 'User Created Successfully',
            'data' => $user,
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $input = $request->validated();
        $email = $input['email'];
        $password = $input['password'];

        $user = User::where('email', $email)->first();
        if (! empty($user)) {
            if (Hash::check($password, $user->password)) {
                $token = $user->createToken('mytoken')->accessToken;

                return response()->json([
                    'status' => true,
                    'message' => 'Login successful',
                    'token' => $token,
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Password didn't match",
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Email value',
            ]);
        }
    }
}
