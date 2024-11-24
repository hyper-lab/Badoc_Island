<?php
// app/Http/Kernel.php
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
       'check.reservation.step' => \App\Http\Middleware\CheckReservationStep::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $routeMiddleware = [

        'admin.logout' => \App\Http\Middleware\AdminLogoutMiddleware::class,
      // 'check.reservation.step' => \App\Http\Middleware\CheckReservationStep::class, // Add this line
    ];
    protected $middlewareAliases = [
       //  'check.reservation.step' => \App\Http\Middleware\CheckReservationStep::class,
    ];
}