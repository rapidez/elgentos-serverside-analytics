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
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $gaUserId = $request->hasCookie('gaUserId') ? $request->cookie('gaUserId') : Str::uuid();
        if (!$request->hasCookie('gaUserId')) {
            $result = $next($request)->withCookie(cookie()->forever('gaUserId', $gaUserId));
        }

        config(['frontend.gaUserId' => $gaUserId]);

        $gamp = GAMP::setClientId($gaUserId)
            ->setUserAgentOverride($request->userAgent())
            ->setDocumentPath($request->path())
            ->setIpOverride($request->ip())
            ->sendPageview();

        return $result ?? $next($request);
    }
}
