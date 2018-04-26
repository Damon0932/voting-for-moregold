<?php

namespace App\Http\Middleware;

use Closure;

class Voting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Cache::has('voted_user_id_'.\Auth::user()->id) && \Cache::get('voted_user_id_'.\Auth::user()->id)) {
            dd("You've voted for it");
        }
        return $next($request);
    }
}
