<?php

use App\Http\Controllers\API\v1\Auth\AuthUserController;
use App\Http\Controllers\API\v1\Auth\RegisterUserController;
use App\Http\Controllers\API\v1\UrlController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register');
    Route::post('/tokens/create', [AuthUserController::class, 'create'])->name('tokens.create');

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('urls', UrlController::class)->only(['index', 'store']);
    });
});
