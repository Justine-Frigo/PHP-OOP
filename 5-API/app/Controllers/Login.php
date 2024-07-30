<?php

namespace app\Controllers;

use app\Models\User;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Firebase\JWT\JWT;

class Login extends Auth
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $this->getCredentials($request);

        $user = User::findByEmail($credentials['email']);

        if (!$user || !password_verify($credentials['password'], $user->password)) {
            return $this->jsonResponse($user->password);
            return new JsonResponse(['error' => 'Invalid credentials'], 401);
        }

        $token = JWT::encode([
            'sub' => $user->id,
            'exp' => time() + ($_ENV['JWT_TTL'] * 60)
        ], $_ENV['JWT_SECRET'], 'HS256');

        return $this->respondWithToken($token);
    }

    public function logout(Request $request): JsonResponse
    {
        $token = $request->headers->get('Authorization');
        if ($token) {
            return $this->jsonResponse("You've been successfully disconnected!");
        } else {
            throw new Exception("No token provided. Please contact the support.");
        }
    }

    protected function getCredentials(Request $request): array
    {
        return [
            'email' => $request->request->get('email'),
            'password' => $request->request->get('password')
        ];
    }
}
