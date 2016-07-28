<?php

namespace App\Http\Middleware;

use App\Iagsession;
use Closure;
use Illuminate\Support\Facades\Session;

class RedirectIfActiveSessionIsNull
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
        $iagsession = new Iagsession();

        // $as = activesession
        $as = $iagsession->find($request->sid);
//        dd($as->ActiveSession);
        if($as && $as->ActiveSession == '0')
        {
             abort(505);
        }
        return $next($request);
    }
}
