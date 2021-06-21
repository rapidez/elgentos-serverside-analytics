<?php

namespace Rapidez\ElgentosServersideAnalytics\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Irazasyed\LaravelGAMP\Facades\GAMP;

class ElgentosServersideAnalytics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $gamp = GAMP::setClientId($request->session()->getId())
            ->setUserAgentOverride($request->userAgent())
            ->setDocumentPath($request->path())
            ->setIpOverride($request->ip())
            ->sendPageview();

        return $next($request);
    }
}
