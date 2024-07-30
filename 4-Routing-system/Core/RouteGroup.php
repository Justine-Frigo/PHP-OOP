<?php

class RouteGroup
{
    protected $router;
    protected $prefix;

    public function __construct($router, $prefix)
    {
        $this->router = $router;
        $this->prefix = $prefix;
    }

    public function group($callback)
    {
        $previousPrefix = $this->router->getPrefix();
        $this->router->setPrefix($previousPrefix . '/' . trim($this->prefix, '/'));
        
        $callback();
        
        $this->router->setPrefix($previousPrefix);
    }
}