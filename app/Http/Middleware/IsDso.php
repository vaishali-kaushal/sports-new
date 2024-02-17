<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleGroup;
use App\Models\RoleType;


class IsDso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
// var_dump(Auth::user());
// die;
//         die;
        if (!empty(Auth::user()->id)) {


            $group =  RoleType::where('user_id', Auth::user()->id)->first();
          
            if ($group->user_role->role_name == 'dso') {
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

        // return $next($request);
    }
}
