<?php
namespace app\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;

abstract class Controller
{
    protected function jsonResponse($data, int $status = 200): JsonResponse
    {
        $response = new JsonResponse($data, $status, [], false);
        $response->setEncodingOptions(JSON_PRETTY_PRINT);
        return $response;
    }
}