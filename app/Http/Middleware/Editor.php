<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Editor
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
      if (!Session::has('editor')) {
          return redirect('en/login');
      }
        return $next($request);
    }
}
