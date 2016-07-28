<?php

namespace App\Http\Middleware;

use App\Iagsession;
use Closure;

class RedirectIfUserIsNotEditor
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
        $iagsession = new Iagsession();

        // $as = activesession
        $as = $iagsession->find($request->sid);
//        dd($as->ActiveSession);
        if ($as && $as->Access112 <> '2') {
            abort(504);
        }
        return $next($request);
    }
}