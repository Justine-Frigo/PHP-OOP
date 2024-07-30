<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && strcasecmp($_SERVER['CONTENT_TYPE'], 'application/x-www-form-urlencoded') !== 0) {
    $input = file_get_contents('php://input');
    $_POST = json_decode($input, true);
}

try {
    require_once __DIR__ . '/../Core/Router.php';
    require_once __DIR__ . '/../Core/Route.php';
    require_once __DIR__ . '/../Core/RouteGroup.php';
    require_once __DIR__ . '/../Controller/HomepageController.php';
    require_once __DIR__ . '/../Controller/ArticleController.php';
    require_once __DIR__ . '/../Model/Article.php';

    $router = new Router();
    Route::setRouter($router);

    require_once __DIR__ . '/../routes.php';

    $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
} catch (Exception $e) {
    error_log($e->getMessage());
    error_log($e->getTraceAsString());

    http_response_code(500);
    require __DIR__ . '/../View/errors/500.php';
}
