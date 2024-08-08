<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureStatamicPageAccessIsPermitted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loggedIn = Auth::guard('portal')->check();
        $requestUri = $request->getRequestUri();
        $publicPaths = $this->getPublicPaths();
        if (
            $loggedIn
            || in_array($requestUri, $publicPaths)
        ) {
            return $next($request);
        }

        return redirect('login');
    }

    public function getPublicPaths(): array
    {
        return config('statamic.public_paths');
    }
}
