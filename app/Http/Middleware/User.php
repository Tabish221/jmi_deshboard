<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class User
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

      if (!Session::has('user')) {

        return redirect('en/login');


        return response()->json([
            'errors' =>
            [
                'en'=>'You must log in first ',
                'ar'=>'يحب عليك تسجيل الدخول اولا',
                'ru'=>'Имя пользователя или пароль неверны'

            ]
        ], 401);
      }
        return $next($request);
    }

}
