<?php

namespace App\Http\Controllers\Base;

use JWTAuth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Base\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;

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
        try {
            if (! $token = JWTAuth::attempt($request->only('email', 'password'))) {
                return $this->responseError(['message' => 'Credenciais Inválidas'], 422, 'AUTH_ERROR');
            }
        } catch (JWTException $e) {
            return $this->responseError(['message' => 'Não foi possível realizar a autenticação, por favor tente novamente mais tarde'], 422, 'INTERNAL_ERROR');
        }

        return $this->responseSuccess(['token' => compact('token')]);
    }
}
