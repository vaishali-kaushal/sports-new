<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RoleGroup;
use App\Models\RoleType;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(Auth::user()->id)) {


            $group =  RoleType::where('user_id', Auth::user()->id)->first();
          
            if ($group->user_role->role_name == 'admin') {
                return $next($request);
            } else {
                Auth::logout();
                return redirect('login');
            }
            // die;
        } else {
            Auth::logout();
            return redirect('login');
        }
    }
}
