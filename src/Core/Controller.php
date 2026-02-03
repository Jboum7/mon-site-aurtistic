<?php

namespace App\Core;

abstract class Controller
{
    protected function render(string $view, array $params = []): void
    {
        extract($params);
        require dirname(__DIR__) . '/../template/' . $view . '.php';
    }
}
