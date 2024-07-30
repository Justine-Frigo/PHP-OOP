<?php

class Router
{
    protected $routes = [];
    protected $prefix = '';

    public function addRoute($method, $uri, $action)
    {
        $uri = '/' . trim($this->prefix . '/' . trim($uri, '/'), '/');
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'action' => $action
        ];
    }

    protected function uriMatches($routeUri, $requestUri, &$matches = [])
    {
        // Remove trailing slashes from both URIs
        $routeUri = rtrim($routeUri, '/');
        $requestUri = rtrim($requestUri, '/');

        $pattern = preg_replace('/\/{([^\/]+)}/', '/([^/]+)', $routeUri);
        $pattern = "#^" . $pattern . "$#";

        return preg_match($pattern, $requestUri, $matches);
    }

    public function dispatch($method, $uri)
    {
        $uri = $this->removeQueryString($uri);

        foreach ($this->routes as $route) {
            $matches = [];
            if ($route['method'] === $method && $this->uriMatches($route['uri'], $uri, $matches)) {
                array_shift($matches);
                return $this->callAction($route['action'], $matches);
            }
        }

        http_response_code(404);
        require __DIR__ . '/../View/errors/404.php';
    }

    protected function callAction($action, $params = [])
    {
        if (is_callable($action)) {
            return call_user_func_array($action, $params);
        }

        if (is_array($action) && count($action) === 2) {
            $controller = new $action[0]();
            return call_user_func_array([$controller, $action[1]], $params);
        }

        throw new Exception("Invalid route action");
    }

    protected function removeQueryString($uri)
    {
        return strtok($uri, '?');
    }

    public function setPrefix($prefix)
    {
        $this->prefix = '/' . trim($prefix, '/');
    }

    public function getPrefix()
    {
        return $this->prefix;
    }
}
