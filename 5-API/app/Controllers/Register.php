<?php

namespace app\Controllers;

use app\Models\User;
use DateTime;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Firebase\JWT\JWT;

class Register extends Auth
{
    public function register(Request $request): JsonResponse
    {
        $data = $request->request->all();
        
        // Perform necessary validation
        if (empty($data['email']) || empty($data['password'])) {
            return new JsonResponse(['error' => 'Missing fields'], 400);
        }
        $data['hashed_password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $user = User::create([
            'username' => $data['username'],
            'email'=> $data['email'],
            'password'=> $data['hashed_password'],
        ]);

        if ($user) {
            $token = JWT::encode([
                'sub' => $user->id,
                'exp' => time() + ($_ENV['JWT_TTL'] * 60)
            ], $_ENV['JWT_SECRET'], 'HS256');

            return $this->respondWithToken($token);
        }

        return new JsonResponse(['error' => 'Failed to register user'], 500);
    }

    protected function getCredentials(Request $request): array
    {
        return [
            'email' => $request->request->get('email'),
            'password' => $request->request->get('password')
        ];
    }
}
