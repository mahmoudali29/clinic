<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      switch ($guard) {
        case 'admin':
          if (Auth::guard($guard)->check()) { //check if guard logged in or not
              return redirect()->route('admin.dashboard');
          }
          break;

        default:
            if (Auth::guard($guard)->check()) { //for normal user
                return redirect('/');
            }
          break;
      }


        return $next($request);
    }
}
