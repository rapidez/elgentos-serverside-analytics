<?php

namespace Rapidez\ElgentosServersideAnalytics;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Rapidez\ElgentosServersideAnalytics\Http\Middleware\ElgentosServersideAnalytics;

class ElgentosServersideAnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->pushMiddlewareToGroup('web', ElgentosServersideAnalytics::class);
    }
}
