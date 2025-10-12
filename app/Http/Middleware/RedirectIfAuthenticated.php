<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
   {
        if ($request->is('login') || $request->is('login*')) {
            return $next($request); 
        }
    
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (session()->has('user')) {
                    $user = session('user');

                switch (strtolower(trim($user))) {
                    case 'executive':
                        return redirect()->route('attendant.index');
                    case 'manager':
                        return redirect()->route('inventory.index');
                    case 'internaladvisor':
                        return redirect()->route('sommelier.index');
                    default:
                        return redirect('/');
                }
            } else {
                return redirect('/');        
            }
        }
    }
        return $next($request);
    }
}
