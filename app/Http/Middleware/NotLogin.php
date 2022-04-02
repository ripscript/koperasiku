<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class NotLogin
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
        $user = Session::get('admin');
        if ($user != null) {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
