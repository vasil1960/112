<?php

namespace App\Http\Middleware;

use App\Iagsession;
use Closure;

class RedirectIfAccess112IsNull
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
//        dd($as->Access112);

        if($as && $as->ActiveSession == '1' && $as->Access112 == '0' )
        {
            abort(504);
        }
        return $next($request);
    }
}
