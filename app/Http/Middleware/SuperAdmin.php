<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (!Session::has('superadmin')) {
          return redirect('en/login');
      }
        return $next($request);
    }
}
