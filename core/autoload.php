<?php
if(!defined('INIT')) die('Direct access not allowed.');
/**
 * Simple PSR-4 Autoloader for projects without Composer.
 */

spl_autoload_register(function ($class) {
    // Project-specific namespace prefix
    $prefix = 'App\\'; // Change this to your project's root namespace

    // Base directory for the namespace prefix
    $base_dir = __DIR__ . '/../'; // Adjust if your classes are elsewhere

    // Does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // No, move to the next registered autoloader
        return;
    }

    // Get the relative class name
    $relative_class = substr($class, $len);

    // Replace namespace separators with directory separators, append with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});