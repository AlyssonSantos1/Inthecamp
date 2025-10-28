<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        if ($request->is('login') || $request->is('login*')) {
            return $next($request);
        }

        $guards = empty($guards) ? ['owner'] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $owner = Auth::guard($guard)->user();

                
                switch (strtolower(trim($owner->function))) {
                    case 'sommelier':
                        return redirect()->route('sommelier.area');
                    case 'inventory':
                        return redirect('/newstock');
                    case 'attendant':
                        return redirect('/creating');
                    default:
                        return redirect('/');
                }
            }
        }

    
        return $next($request);
    }
}
