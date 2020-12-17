<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Lailioo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if( $request->header('umi-khabibatulailiah') == null )
        // {
        //     if( $request->method() == "POST" ) return redirect('/');

        //     return view('untrusted');
        // }

        return $next($request);
    }
}
