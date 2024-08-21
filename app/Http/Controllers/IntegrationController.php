<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntegrationRequest;
use App\Models\Integration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function store(IntegrationRequest $request): JsonResponse
    {
        $user = auth(guard: "api")->user();
        $validatedData = $request->validated();

        $integration = Integration::create($validatedData);

        return response()->json([
            'data' => $integration,
            'user' => $user,
        ]);
    }
    public function update(IntegrationRequest $request, $id): JsonResponse
    {
        $validatedData = $request->validated();

        $integration = Integration::findOrFail($id);

        $integration->update($validatedData);

        return response()->json(['data' => $integration]);
    }

}