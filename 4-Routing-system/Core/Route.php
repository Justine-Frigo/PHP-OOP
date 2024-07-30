<?php

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

    public static function get($uri, $action)
    {
        self::$router->addRoute('GET', $uri, $action);
    }

    public static function post($uri, $action)
    {
        self::$router->addRoute('POST', $uri, $action);
    }

    public static function put($uri, $action)
    {
        self::$router->addRoute('PUT', $uri, $action);
    }

    public static function patch($uri, $action)
    {
        self::$router->addRoute('PATCH', $uri, $action);
    }

    public static function delete($uri, $action)
    {
        self::$router->addRoute('DELETE', $uri, $action);
    }

    public static function prefix($prefix)
    {
        return new RouteGroup(self::$router, $prefix);
    }
}