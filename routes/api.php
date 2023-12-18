<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\UrlController;
use App\Http\Controllers\API\v1\Auth\AuthUserController;
use App\Http\Controllers\API\v1\Auth\RegisterUserController;
use App\Http\Controllers\API\v2\UrlController as V2UrlController;
use App\Http\Controllers\API\v2\Auth\AuthUserController as V2AuthUserController;
use App\Http\Controllers\API\v2\Auth\RegisterUserController as V2RegisterUserController;

Route::prefix('v1')->group(function () {
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register');
    Route::post('/tokens/create', [AuthUserController::class, 'create'])->name('tokens.create');

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('urls', UrlController::class)->only(['index', 'store']);
    });
});

Route::prefix('v2')->group(function () {
    Route::post('/register', [V2RegisterUserController::class, 'store'])->name('register');
    Route::post('/tokens/create', [V2AuthUserController::class, 'create'])->name('tokens.create');

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('urls', V2UrlController::class)->only(['index', 'store']);
    });
});
