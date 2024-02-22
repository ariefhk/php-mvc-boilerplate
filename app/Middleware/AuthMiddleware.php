<?php

namespace App\Middleware;

use App\Middleware\Middleware;

class AuthMiddleware implements Middleware
{

    function before(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            # code...
            header('Location: /login');
            exit();
        }
    }
}
