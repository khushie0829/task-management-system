<?php

namespace App\core\Classes;

class Config
{
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function __get($key)
    {
        return $this->items[$key] ?? null;
    }

    public function __set($key, $value)
    {
        $this->items[$key] = $value;
    }

    public function all()
    {
        return $this->items;
    }

    public function has($key)
    {
        return array_key_exists($key, $this->items);
    }

    public function get($key, $default = null)
    {
        return $this->items[$key] ?? $default;
    }

}
