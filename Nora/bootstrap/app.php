<?php

use App\Http\Middleware\IsUserAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \Illuminate\Auth\Middleware\Authenticate;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'auth'  => Authenticate::class,
            'admin' => IsUserAdmin::class,  
        ]);
        $middleware->redirectGuestsTo('/');
    })
    ->withProviders()
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

    
