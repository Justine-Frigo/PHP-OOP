<?php

namespace app\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->headers->get('Authorization');

        if (!$token) {
            return new JsonResponse(['error' => 'Token not provided'], 401);
        }

        try {
            $token = str_replace('Bearer ', '', $token);
            $decoded = JWT::decode($token, new Key($_ENV['JWT_SECRET'], 'HS256'));

            // Inject decoded token into the request for further use
            $request->attributes->set('jwt', $decoded);
        } catch (Exception $e) {
            return new JsonResponse(['error' => 'Invalid token: ' . $e->getMessage()], 401);
        }

        return $next($request);
    }
}
