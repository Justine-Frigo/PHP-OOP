<?php

namespace app\Core;

use Closure;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class Router
{
    protected $routes = [];
    protected $prefix = '';
    protected $globalMiddleware = [];

    public function addMiddleware($middleware)
    {
        if (is_array($middleware)) {
            $this->globalMiddleware = array_merge($this->globalMiddleware, $middleware);
        } else {
            $this->globalMiddleware[] = $middleware;
        }
    }

    public function getMiddleware()
    {
        return $this->globalMiddleware;
    }

    public function setMiddleware($middleware)
    {
        $this->globalMiddleware = $middleware;
    }

    public function addRoute($method, $uri, $action, $middleware = [])
    {
        $uri = '/' . trim($this->prefix . '/' . trim($uri, '/'), '/');
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'action' => $action,
            'middleware' => array_merge($this->globalMiddleware, (array) $middleware)
        ];
    }

    protected function uriMatches($routeUri, $requestUri, &$matches = []): int|bool
    {
        $routeUri = rtrim($routeUri, '/');
        $requestUri = rtrim($requestUri, '/');
        $pattern = preg_replace('/\/{([^\/]+)}/', '/([^/]+)', $routeUri);
        $pattern = "#^" . $pattern . "$#";
        return preg_match($pattern, $requestUri, $matches);
    }

    public function dispatch(Request $request): Response
    {
        $method = $request->getMethod();
        $uri = $this->removeQueryString($request->getPathInfo());

        foreach ($this->routes as $route) {
            $matches = [];
            if ($route['method'] === $method && $this->uriMatches($route['uri'], $uri, $matches)) {
                array_shift($matches);

                $middlewareStack = array_merge($this->globalMiddleware, $route['middleware']);
                $action = $route['action'];

                $response = $this->applyMiddleware($middlewareStack, $request, function ($request) use ($action, $matches) {
                    return $this->callAction($action, $matches, $request);
                });

                return $response;
            }
        }

        return new JsonResponse(['error' => 'Not Found'], 404);
    }

    protected function applyMiddleware(array $middlewareStack, Request $request, Closure $next): Response
    {
        $middleware = array_shift($middlewareStack);

        if ($middleware === null) {
            return $next($request);
        }

        $middlewareInstance = new $middleware();
        return $middlewareInstance->handle($request, function ($request) use ($middlewareStack, $next) {
            return $this->applyMiddleware($middlewareStack, $request, $next);
        });
    }

    protected function callAction($action, $params, Request $request): Response
    {
        try {
            if (is_array($action) && count($action) === 2) {
                $controller = new $action[0]();
                $method = new \ReflectionMethod($controller, $action[1]);

                $dependencies = [];
                foreach ($method->getParameters() as $parameter) {
                    $parameterType = $parameter->getType();
                    if ($parameterType && !$parameterType->isBuiltin()) {
                        $parameterClass = new \ReflectionClass($parameterType->getName());
                        if ($parameterClass->isInstance(new Request())) {
                            $dependencies[] = $request;
                        }
                    }
                }

                $result = call_user_func_array([$controller, $action[1]], array_merge($dependencies, $params));
            } elseif (is_callable($action)) {
                $result = call_user_func_array($action, $params);
            } else {
                throw new Exception("Invalid route action");
            }

            if ($result instanceof Response) {
                return $result;
            }

            return new JsonResponse($result);
        } catch (Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    protected function removeQueryString($uri): string
    {
        return strtok($uri, '?');
    }

    public function setPrefix($prefix): void
    {
        $this->prefix = '/' . trim($prefix, '/');
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }
}
