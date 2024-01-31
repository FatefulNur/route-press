<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthUserRequest;
use Symfony\Component\HttpFoundation\Response;

class AuthUserController extends Controller
{
    public function create(AuthUserRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json([
                'message' => 'Unauthenticated (User Not Exist).',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $request->user()->tokens()->delete();

        $token = $request->user()
            ->createToken($request->input('email'))
            ->plainTextToken;

        return response()->json([
            'token_type' => 'Bearer',
            'token' => $token,
        ]);
    }
}
