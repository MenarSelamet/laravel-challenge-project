<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IntegrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::post('/register', [AuthController::class, 'create']);
Route::post("login", [AuthController::class, "login"]);

Route::post('/integrations', [IntegrationController::class, 'store']);
Route::put('/integrations/{id}', [IntegrationController::class, 'update']);