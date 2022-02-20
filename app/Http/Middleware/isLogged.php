<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user())
        {
            $metadata['outcome']="NOT_AUTHORIZED";
            $metadata['outcomeCode']=1;
            $metadata['numOfRecords']=0;
            $metadata['message']="you are not authorized";
            $records=array();
            $errors=array();

            return response()->json([
                '_metadata'    => $metadata,
                'records'   => $records,
                'errors'   => $errors,
            ], 404);

        }

        return $next($request);

    }
}
