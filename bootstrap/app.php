<?php

use App\Http\Middleware\ApiLocalization;
use App\Http\Middleware\WebLocalization;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use League\Config\Exception\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web([
            'WebLocalization' => WebLocalization::class,
        ]);

        $middleware->api([
            'ApiLocalization' => ApiLocalization::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->report(function(Throwable $exception){
            if($exception instanceof Exception)
                Log::info($exception->getMessage());
        })->stop();

        $exceptions->render(function(Throwable $th){
            if ($th instanceof ValidationException) {
                return errorResponse($th->getMessage());
            }

            if ($th instanceof ModelNotFoundException) {
                return errorResponse($th->getMessage());
            }

            if ($th instanceof AuthorizationException) {
                return errorResponse($th->getMessage());
            }
        });
    })->create();
