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
    // Production (SiteGround) serves from "public_html"; local development uses
    // the conventional "public". Laravel resolves the Vite manifest through
    // public_path(), so this must match the directory that actually exists or
    // @vite fails to find public/build/manifest.json.
    ->usePublicPath(
        is_dir($publicHtml = dirname(__DIR__).'/public_html')
            ? $publicHtml
            : dirname(__DIR__).'/public'
    );
