<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class RegisterUserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return response()->json([
            'message' => 'User Created.',
        ], Response::HTTP_CREATED);
    }
}
