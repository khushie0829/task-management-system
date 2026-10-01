<?php

use App\core\Classes\Auth;
use App\core\Classes\Flash;
use App\core\Classes\Route;

if (!defined('INIT')) die('Direct access not allowed.');
if (!function_exists('config')) {
    /**
     * Load and retrieve configuration settings.
     * @param string $name The name of the configuration file (without .php extension).
     * @return Config
     * @throws Exception if the config file does not exist. 
     */
    function config($name)
    {
        static $instances = [];

        if (!isset($instances[$name])) {
            $path = CONFIG_PATH . $name . '.php';
            if (!file_exists($path)) {
                throw new Exception("Config file not found: {$path}");
            }
            $items = require $path;
            $instances[$name] = new \App\core\Classes\Config($items);
        }

        return $instances[$name];
    }
}

if (!function_exists('view')) {
    /**
     * Render a view template with optional data.
     * @param string $template The name of the view template (without .php extension).
     * @param array $data Optional associative array of data to pass to the view.
     * @return void
     * @throws Exception if the view file does not exist.
     */
    function view($template, $data = [])
    {
        $path = VIEW_PATH . $template . '.php';
        if (!file_exists($path)) {
            throw new Exception("View file not found: {$path}");
        }

        extract($data);
        $content = $path;
        if (Auth::isLogin()) include_once VIEW_PATH . 'layouts/master.php';
        else include_once $path;
    }
}

function include_view($template, $data = [])
{
    $path = VIEW_PATH . $template . '.php';
    if (!file_exists($path)) {
        throw new Exception("View file not found: {$path}");
    }
    extract($data);
    include $path;
}

if (!function_exists('redirect')) {
    /**
     * Redirect to a specified URL.
     * @param string $url The URL to redirect to.
     * @param int $statusCode The HTTP status code for the redirection (default is 302).
     * @return void
     */
    function redirect($url, $statusCode = 302, array $data = [])
    {
        if (count($data) > 0) {
            foreach ($data as $k => $v) {
                Flash::set($k, $v);
            }
        }
        header("Location: $url", true, $statusCode);
        exit();
    }
}
if (!function_exists('redirectTo')) {
    function redirectTo(string $path, array $data = []): void
    {
        if (count($data) > 0) {
            foreach ($data as $k => $v) {
                Flash::set($k, $v);
            }
        }
        $baseUrl = rtrim(config('App')->get('base_url', ''), '/');
        $path = str_replace(ltrim($baseUrl, '/') . '/', "", $path);
        if ($path === "") $path = "/";

        // Fix Wrong Redirects with Double paths
        $path = $baseUrl . '/' . ltrim($path, '/');

        header('Location: ' . $path);
        exit;
    }
}
if (!function_exists('redirectBack')) {
    function redirectBack(array $data = []): void
    {
        $fallback = '/';
        if (!headers_sent()) {
            // Use HTTP_REFERER if set and safe
            $referrer = $_SERVER['HTTP_REFERER'] ?? null;
            if (count($data) > 0) {
                foreach ($data as $k => $v) {
                    Flash::set($k, $v);
                }
            }

            // Optional: Basic validation to avoid open redirect attacks
            if ($referrer && parse_url($referrer, PHP_URL_HOST) === $_SERVER['HTTP_HOST']) {
                header('Location: ' . $referrer);
                exit;
            }

            // Fall back to default URL if no valid referrer
            header('Location: ' . $fallback);
            exit;
        } else {
            // Headers already sent: fallback to JS redirect
            echo "<script>window.location.href = '" . htmlspecialchars($fallback, ENT_QUOTES) . "';</script>";
            exit;
        }
    }
}
if (!function_exists('abort')) {
    /**
     * Abort the request with a specified HTTP status code and message.
     * @param int $code The HTTP status code (e.g., 404, 500).
     * @param string $message Optional message to display.
     * @return void
     */    function abort($code, $message = '')
    {
        http_response_code($code);
        if ($message) {
            echo htmlspecialchars($message);
        } else {
            echo "Error $code";
        }
        exit();
    }
}

if (!function_exists('asset')) {
    /**
     * Generate a full URL for an asset.
     * @param string $path The relative path to the asset.
     * @return string The full URL to the asset.
     */
    function asset($path)
    {
        $baseUrl = rtrim(config('App')->get('base_url', ''), '/');
        return $baseUrl . '/' . ltrim($path, '/');
    }
}

if (!function_exists('routeTo')) {
    /**
     * Generate a URL for a named route.
     * @param string $name The name of the route.
     * @param array $params Optional associative array of parameters to replace in the route.
     * @return string The generated URL.
     * @throws Exception if the route name does not exist.
     */
    function routeTo($name, $params = [])
    {
        $route = \App\core\Classes\Route::getByName($name);
        if (!$route) {
            throw new Exception("Route not found: {$name}");
        }

        $uri = $route['uri'];
        foreach ($params as $key => $value) {
            $uri = str_replace('{' . $key . '}', $value, $uri);
        }

        $baseUrl = rtrim(config('App')->get('base_url', ''), '/');
        return $baseUrl . '/' . ltrim($uri, '/');
    }
}
if (!function_exists('activeRoute')) {
    function activeRoute($name)
    {
        return Route::isRouteActive($name) ? "active" : "";
    }
}
if (!function_exists('old')) {
    function old(string $key, $default = '')
    {
        $old = Flash::get('old') ?? [];
        return htmlspecialchars($old[$key] ?? $default);
    }
}
if (!function_exists('error')) {
    function error(string $field): string
    {
        $errors = Flash::get('errors') ?? [];
        if (isset($errors[$field])) {
            $msgs = '';
            foreach ((array)$errors[$field] as $msg) {
                $msgs .= "<div class='error-message' style='color: #e57373; margin-top: 4px;'>"
                    . htmlspecialchars($msg) . "</div>";
            }
            return $msgs;
        }
        return '';
    }
}
if (!function_exists('hasDesignations')) {
    function hasDesignations($designations): bool
    {
        $user = Auth::user();
        if (!$user) return false;
        $userDesignations = explode(',', strtolower($user->designation));
        foreach ((array)$designations as $designation) {
            if (in_array(strtolower($designation), $userDesignations)) {
                return true;
            }
        }
        return false;
    }
}
