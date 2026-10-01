<?php
namespace App\core\Classes;

class Sanitizer
{
    /**
     * Sanitize string to remove harmful scripts, trim, encode special chars
     */
    public static function sanitizeString(string $input): string
    {
        // Remove invisible characters (control chars)
        $input = preg_replace('/[\x00-\x1F\x7F]/u', '', $input);

        // Strip tags to avoid HTML/script injection
        $input = strip_tags($input);

        // Convert special characters to HTML entities
        $input = htmlspecialchars($input, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

        // Trim whitespace
        return trim($input);
    }

    /**
     * Sanitize email
     */
    public static function sanitizeEmail(string $email): ?string
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null;
    }

    /**
     * Sanitize URL
     */
    public static function sanitizeUrl(string $url): ?string
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }

    /**
     * Sanitize integer
     */
    public static function sanitizeInt($int): ?int
    {
        if (filter_var($int, FILTER_VALIDATE_INT) !== false) {
            return (int)$int;
        }
        return null;
    }

    /**
     * Sanitize float
     */
    public static function sanitizeFloat($float): ?float
    {
        if (filter_var($float, FILTER_VALIDATE_FLOAT) !== false) {
            return (float)$float;
        }
        return null;
    }

    /**
     * Recursively sanitize array of strings
     */
    public static function sanitizeArray(array $arr): array
    {
        $sanitized = [];
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $sanitized[$key] = self::sanitizeArray($value);
            } elseif (is_string($value)) {
                $sanitized[$key] = self::sanitizeString($value);
            } else {
                $sanitized[$key] = $value;
            }
        }
        return $sanitized;
    }

    /**
     * Recursively sanitize a value (string or array)
     */
    public static function deepSanitize($value)
    {
        if (is_array($value)) {
            $sanitized = [];
            foreach ($value as $key => $val) {
                $sanitized[$key] = self::deepSanitize($val);
            }
            return $sanitized;
        } elseif (is_string($value)) {
            return self::sanitizeString($value);
        }
        // For other types (int, bool, etc.) leave as is
        return $value;
    }

    /**
     * Sanitize all PHP superglobals in one go
     * Returns an associative array of sanitized data copies
     * Does NOT modify original superglobals
     */
    public static function sanitizeAllSuperglobals(): array
    {
        $sanitized = [];

        $sanitized['_GET'] = self::deepSanitize($_GET);
        $sanitized['_POST'] = self::deepSanitize($_POST);
        $sanitized['_REQUEST'] = self::deepSanitize($_REQUEST);
        $sanitized['_COOKIE'] = self::deepSanitize($_COOKIE);

        // For FILES, sanitize file names only (content is binary)
        $sanitized['_FILES'] = self::sanitizeFiles($_FILES);

        // Optionally sanitize $_SERVER if needed (usually less user input)
        $sanitized['_SERVER'] = self::deepSanitize($_SERVER);

        return $sanitized;
    }

    /**
     * Sanitize the $_FILES superglobal safely
     * Sanitize filenames and preserve file structure
     */
    public static function sanitizeFiles(array $files)
    {
        $sanitizedFiles = [];

        foreach ($files as $key => $fileInfo) {
            if (is_array($fileInfo['name'])) {
                // Handle multiple files (arrays)
                $sanitizedFiles[$key] = [
                    'name' => self::deepSanitize($fileInfo['name']),
                    'type' => $fileInfo['type'],
                    'tmp_name' => $fileInfo['tmp_name'],
                    'error' => $fileInfo['error'],
                    'size' => $fileInfo['size'],
                ];
            } else {
                $sanitizedFiles[$key] = [
                    'name' => self::sanitizeString($fileInfo['name']),
                    'type' => $fileInfo['type'],
                    'tmp_name' => $fileInfo['tmp_name'],
                    'error' => $fileInfo['error'],
                    'size' => $fileInfo['size'],
                ];
            }
        }

        return $sanitizedFiles;
    }
}
