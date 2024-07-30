<?php

declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use app\Core\Route;
use app\Core\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$request = Request::createFromGlobals();
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $router = new Router();
    Route::setRouter($router);
    require_once __DIR__ . '/../routes/api.php';
    $response = $router->dispatch($request);
    $response->send();
} catch (Exception $e) {
    error_log($e->getMessage());
    error_log($e->getTraceAsString());
    $response = new JsonResponse(['error' => 'Internal Server Error'], 500);
    $response->send();
}
