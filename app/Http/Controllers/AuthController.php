<?php

namespace App\Http\Controllers;

use App\Http\Requests\OAuth\TokenRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends ApiController {
    public function accessToken(TokenRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $user = User::where('email', $credentials['accessToken'])->first();
        if (!$user || !Hash::check($credentials['secret'], $user->password)) {
            return $this->unauthorizedResponse('Invalid credentials');
        }

        //issuer the token

        return response()->json($credentials, 200);
    }
}
