<?php
if (!defined('INIT')) die('Direct access not allowed.');
// core/preload.php

// Load Composer autoloader if available
if (file_exists(BASE_PATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php')) {
    require_once BASE_PATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
} else require_once CORE_PATH . 'autoload.php';

// Load .env file if available
$dotenvPath = BASE_PATH . '.env';
if (file_exists($dotenvPath)) {
    if (!class_exists('Dotenv\Dotenv')) {
        // Simple .env loader if vlucas/phpdotenv is not installed
        $lines = file($dotenvPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            list($name, $value) = array_map('trim', explode('=', $line, 2));
            if (!array_key_exists($name, $_ENV)) {
                putenv("$name=$value");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    } else {
        // Use vlucas/phpdotenv if available
        Dotenv\Dotenv::createImmutable(dirname($dotenvPath))->load();
    }
}

// Set default timezone if not set
if (!ini_get('date.timezone')) {
    date_default_timezone_set('UTC');
}

// Start session if not already started
// For API requests, it's common to avoid starting a session unless needed.
// You can check if the request is an API call and skip session_start() if so.

$isApiRequest = isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/api/') === 0;

if (!$isApiRequest && session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set error reporting based on environment
$appEnv = getenv('APP_ENV') ?: 'production';
$appDebug = filter_var(getenv('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN);

if ($appEnv === 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}
if ($appDebug) {
    ini_set('log_errors', 1);
    ini_set('error_log', LOGS_PATH . 'error.log');
}