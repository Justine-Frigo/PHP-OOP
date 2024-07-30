<?php

namespace app\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class Auth extends Controller
{
    abstract protected function getCredentials(Request $request): array;

    protected function respondWithToken($token)
    {
        return new JsonResponse([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $_ENV['JWT_TTL'] * 60
        ]);
    }
}
