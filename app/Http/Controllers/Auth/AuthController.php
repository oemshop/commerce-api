<?php

namespace App\Http\Controllers\Auth;

use JWTAuth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    /**
     * Authenticate to generate a jwt token.
     *
     * @param  LoginRequest $request
     *
     * @return json
     */
    public function authenticate(LoginRequest $request)
    {
        if (! $token = JWTAuth::attempt($request->only('email', 'password'))) {
            return $this->responseError(['message' => 'Credenciais Inválidas'], 422, 'AUTH_ERROR');
        }

        return $this->responseSuccess(['token' => compact('token')]);
    }
}
