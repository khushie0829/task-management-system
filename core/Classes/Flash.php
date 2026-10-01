<?php

namespace App\core\Classes;

class Flash
{

    protected static $data = [];

    public static function set(string $key, $value): void
    {
        if (!session_id()) {
            session_start();
        }
        $_SESSION['flash'][$key] = $value;
    }

    public static function get(string $key)
    {
        return self::$data[$key] ?? null;
    }
    public static function getData()
    {
        self::$data = $_SESSION['flash'] ?? [];
        unset($_SESSION['flash']);
    }

    public static function has(string $key): bool
    {
        return isset(self::$data[$key]);
    }
}
