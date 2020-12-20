<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        if(\Session::has('locale'))
        {
            \App::setlocale(\Session::get('locale'));
        }
        return $next($request);
    }
}
