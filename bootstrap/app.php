<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthWarga;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        $middleware->alias('admin', AuthAdmin::class);
        $middleware->alias('warga', AuthWarga::class);
    })
    ->create();
