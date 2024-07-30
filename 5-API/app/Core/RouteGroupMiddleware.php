<?php
namespace app\Core;

class RouteGroupMiddleware
{
    protected $router;
    protected $middleware;

    public function __construct($router, $middleware)
    {
        $this->router = $router;
        $this->middleware = $middleware;
    }

    public function group($callback)
    {
        $previousMiddleware = $this->router->getMiddleware();
        $this->router->addMiddleware($this->middleware);
        $callback();
        $this->router->setMiddleware($previousMiddleware);
    }
}