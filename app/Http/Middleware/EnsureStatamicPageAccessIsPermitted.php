<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Statamic\Facades\Entry;

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

        $entry = Entry::findByUri($requestUri);
        $entryIsPublic = $entry ? data_get($entry->data(), 'public', false) : false;
        if ($loggedIn || $entryIsPublic) {
            return $next($request);
        }

        return redirect('login');
    }
}
