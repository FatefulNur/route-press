<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V2\UrlController;
use App\Http\Controllers\Api\V2\Auth\AuthUserController;
use App\Http\Controllers\Api\V2\Auth\RegisterUserController;

Route::post('/register', [RegisterUserController::class, 'store'])->name('register');
Route::post('/tokens/create', [AuthUserController::class, 'create'])->name('tokens.create');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('urls', UrlController::class)->only(['index', 'store']);
});
