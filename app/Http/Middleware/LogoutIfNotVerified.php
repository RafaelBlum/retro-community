<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogoutIfNotVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user && ! $user->hasVerifiedEmail())
        {
            if (! $request->routeIs('verification.notice', 'verification.send', 'logout'))
            {
                Auth::logout();
                return redirect()->route('login')->with('status', 'Precisas de verificar o teu e-mail antes de aceder ao sistema.');
            }
        }
        return $next($request);
    }
}
