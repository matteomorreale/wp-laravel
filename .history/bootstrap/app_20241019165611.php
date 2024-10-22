<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Registra qui il middleware
        $middleware->alias('role', \Spatie\Permission\Middlewares\RoleMiddleware::class);
        $middleware->alias('permission', \Spatie\Permission\Middlewares\PermissionMiddleware::class);
        $middleware->alias('role_or_permission', \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();