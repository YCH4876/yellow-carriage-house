<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create()
    // This project's web root is "public_html" rather than Laravel's default
    // "public", to match SiteGround's document root so the repo can be deployed
    // by `git pull`. Laravel resolves the Vite manifest through public_path(),
    // so without this @vite cannot find public_html/build/manifest.json.
    ->usePublicPath(dirname(__DIR__).'/public_html');
