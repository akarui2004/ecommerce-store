<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OAuth\TokenRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends ApiController {
    public function accessToken(TokenRequest $request)
    {
        $credentials = $request->validated();
        $user = User::where('email', $credentials['accessToken'])->first();
        if (!$user || !Hash::check($credentials['secret'], $user->password)) {
            return $this->unauthorizeResponse('Invalid credentials');
        }

        //issuer the token

        return response()->json($credentials, 200);
    }
}
