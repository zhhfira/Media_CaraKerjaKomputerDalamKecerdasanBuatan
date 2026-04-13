<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminOnly;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->redirectGuestsTo('/login');

        $middleware->redirectUsersTo(function () {
            if (auth()->check()) {
                if (auth()->user()->usertype === 'admin') {
                    return route('guru.dashboard');
                }
                return route('siswa.dashboard');
            }
            return '/';
        });

        $middleware->alias([
            'admin' => AdminOnly::class,
            'student' => \App\Http\Middleware\StudentOnly::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
