<?php

namespace App\Config;

class View
{
    public static function render(string $view, array $data = []): void
    {
        require_once __DIR__ . '/../View/' . $view . '.php';
    }
}
