<?php

namespace App\core\Classes;

class Route
{
    // Define properties and methods for the Route class
    static $routes      = [];
    static $middlewares = [];
    static $prefix      = '';
    protected static $current_route = '';
    static $isAPI = false;

    public static function add($method, $uri, $handler, $name = null)
    {
        self::$routes[] = [
            'method'        => strtoupper($method),
            'uri'           => self::$prefix . $uri,
            'pattern'       => self::createPattern(self::$prefix . $uri),
            'params'        => self::extractParamNames($uri),
            'handler'       => $handler,
            'name'          => $name,
            'middlewares'   => self::$middlewares
        ];
    }
    public static function get($uri, $handler, $name = null)
    {
        self::add('GET', $uri, $handler, $name);
    }
    public static function post($uri, $handler, $name = null)
    {
        self::add('POST', $uri, $handler, $name);
    }
    public static function put($uri, $handler, $name = null)
    {
        self::add('PUT', $uri, $handler, $name);
    }
    public static function delete($uri, $handler, $name = null)
    {
        self::add('DELETE', $uri, $handler, $name);
    }
    public static function patch($uri, $handler, $name = null)
    {
        self::add('PATCH', $uri, $handler, $name);
    }
    public static function options($uri, $handler, $name = null)
    {
        self::add('OPTIONS', $uri, $handler, $name);
    }
    public static function any($uri, $handler, $name = null)
    {
        self::add('ANY', $uri, $handler, $name);
    }
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function findRoute($method, $uri)
    {
        foreach (self::$routes as $route) {
            if (($route['method'] === $method || $route['method'] === 'ANY') && $route['uri'] === $uri) {
                return $route;
            }
        }
        return null;
    }
    public static function getCurrentRoute()
    {
        return self::$current_route;
    }
    public static function isRouteActive($name)
    {
        return self::$current_route['name'] === $name;
    }
    public static function setPrefix($prefix)
    {
        self::$prefix = $prefix;
    }
    public static function getPrefix()
    {
        return self::$prefix;
    }
    public static function setAsAPI($isAPI)
    {
        self::$isAPI = $isAPI;
    }

    public static function prefix($prefix, $callback)
    {
        $previousPrefix = self::$prefix;
        self::setPrefix($previousPrefix . $prefix);
        call_user_func($callback);
        self::setPrefix($previousPrefix);
    }

    public static function middleware($middlewares, $callback = null)
    {
        $previousMiddleware = self::$middlewares;
        $newMiddlrewares = array_merge($previousMiddleware, $middlewares);
        self::$middlewares = $newMiddlrewares;
        if (!$callback) {
            // self::$middlewares = $previousMiddleware;
            return new self();
        }
        call_user_func($callback);
        self::$middlewares = $previousMiddleware;
    }

    public static function getByName($name)
    {
        foreach (self::$routes as $route) {
            if ($route['name'] === $name) {
                return $route;
            }
        }
        return null;
    }

    // Create a regex pattern from a URI with {param} placeholders
    protected static function createPattern($uri)
    {
        // Escape slashes and replace {param} with named regex groups
        $pattern = preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', '(?P<$1>[^/]+)', $uri);
        // Add start and end delimiters
        return '#^' . $pattern . '$#';
    }

    // Extract parameter names from the URI, e.g. /user/{id} => ['id']
    protected static function extractParamNames($uri)
    {
        $params = [];
        if (preg_match_all('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', $uri, $matches)) {
            $params = $matches[1];
        }
        return $params;
    }

    public static function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        foreach (self::$routes as $route) {
            if ($route['method'] === $method || $route['method'] === 'ANY') {
                if (preg_match($route['pattern'], $uri, $matches)) {
                    // Extract only named params
                    $params = [];
                    foreach ($route['params'] as $param) {
                        if (isset($matches[$param])) {
                            $params[] = $matches[$param];
                        }
                    }
                    if (is_callable($route['handler'])) {
                        return call_user_func_array($route['handler'], $params);
                    } elseif (is_string($route['handler'])) {
                        // Assuming handler is in "Controller@method" format
                        list($controller, $action) = explode('@', $route['handler']);
                        $controllerClass = "App\\Controllers\\$controller";
                        if (class_exists($controllerClass) && method_exists($controllerClass, $action)) {
                            self::$current_route = $route;
                            if (count($route['middlewares']) > 0) {
                                foreach ($route['middlewares'] as $middleware) {
                                    $middlewareClass = "App\\Middlewares\\$middleware";
                                    $m_action = "middleware";
                                    $m_params = [];
                                    if (class_exists($middlewareClass) && method_exists($middlewareClass, "middleware")) {
                                        $m_instance = new $middlewareClass();
                                        call_user_func_array([$m_instance, $m_action], $m_params);
                                    }
                                }
                            }
                            $instance = new $controllerClass();
                            return call_user_func_array([$instance, $action], $params);
                        } else {
                            throw new \Exception("Controller or method not found: $controllerClass::$action");
                        }
                    }
                }
            }
        }
        // Check if the request expects JSON (Accept header)
        if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
            http_response_code(404);
            echo json_encode(["error" => "404 Not Found"]);
        } else {
            http_response_code(404);
            require_once VIEW_PATH . 'errors/404.php';
        }
        exit;
    }
}
