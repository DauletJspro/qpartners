<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Illuminate\Support\Facades\Auth;

class TalgatAndAdmin
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
        if (Auth::user()->role_id != 9 || Auth::user()->role_id != 1){
            return redirect()->back(404);
        }
        return $next($request);
    }
}
