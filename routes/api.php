<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\UrlController;
use App\Http\Controllers\API\v1\Auth\AuthUserController;
use App\Http\Controllers\API\v1\Auth\RegisterUserController;

Route::prefix('v1')->group(function () {
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register');
    Route::post('/tokens/create', [AuthUserController::class, 'create'])->name('tokens.create');
});
