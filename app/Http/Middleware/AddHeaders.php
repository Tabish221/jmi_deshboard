<?php


namespace App\Http\Middleware;

use Closure;

class AddHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //$response->header('header name', 'header value');
      //  $response->header('Cache-Control', 'public, max-age=2592000');
        //$response->header('Content-Encoding', 'br');
        return $response;
    }
}
