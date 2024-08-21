<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

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
}
