<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,

        ]);
        $middleware->redirectGuestsTo(fn() => route('user.auth.showLoginForm'));
        //$middleware->redirectUsersTo(fn()=>route('home.index'));
        $middleware->redirectUsersTo(
            fn(Request $request) =>
            str_starts_with($request->path(), 'admin')
                ? route('dashboard.index')
                : route('home.index')
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
