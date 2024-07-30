<?php

namespace app\Core;

class Route
{
    protected static $router;

    public static function setRouter($router)
    {
        self::$router = $router;
    }

    public static function getRouter()
    {
        return self::$router;
    }

    public static function get($uri, $action, $middleware = [])
    {
        self::$router->addRoute('GET', $uri, $action, $middleware);
    }

    public static function post($uri, $action, $middleware = [])
    {
        self::$router->addRoute('POST', $uri, $action, $middleware);
    }

    public static function put($uri, $action, $middleware = [])
    {
        self::$router->addRoute('PUT', $uri, $action, $middleware);
    }

    public static function patch($uri, $action, $middleware = [])
    {
        self::$router->addRoute('PATCH', $uri, $action, $middleware);
    }

    public static function delete($uri, $action, $middleware = [])
    {
        self::$router->addRoute('DELETE', $uri, $action, $middleware);
    }

    public static function middleware($middlewareClassOrFunction)
    {
        return new RouteGroupMiddleware(self::$router, $middlewareClassOrFunction);
    }

    public static function prefix($prefix)
    {
        return new RouteGroup(self::$router, $prefix);
    }
}
