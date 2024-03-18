<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class CheckDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentDate = Carbon::now();
        $disableDate = Carbon::create(2024, 3, 15);

        if ($currentDate->greaterThanOrEqualTo($disableDate)) {
            abort(403, 'Route disabled after March 15, 2024');
        }

        return $next($request);
    }
}
