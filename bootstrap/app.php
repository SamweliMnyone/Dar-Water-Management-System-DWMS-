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
        //Unaitambulisha hii middleware

        $middleware->alias([
            //admin ni jina la hio middleware unaweza uka name lolote lile
            'check.role' => \App\Http\Middleware\CheckRole::class,
            'already.login' => \App\Http\Middleware\IsAlreadyLogin::class,
            'redirect.if.authenticated' => \App\Http\Middleware\RedirectIfAuthenticated::class,
           
            'api' => [
                \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                'throttle:api',
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
            ],
        ]);


 
    })


    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
