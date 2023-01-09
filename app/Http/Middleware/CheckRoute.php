<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoute
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
        if (env('APP_TYPE') == 'demo') {
            if ($request->isMethod('DELETE'))
            {
               $response = [
                    'status'=>'danger',
                    'message'=>'This is Demo version.  You can not change any thing'
                ];
                return response()->json($response); 
            }
        }
        return $next($request);
    }
}
