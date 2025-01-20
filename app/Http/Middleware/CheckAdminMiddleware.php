<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Role::where('nom_role','admin')->get();
        // dd(Auth::user()->id_role);
        if (Auth::check() && Auth::user()->id_role === 2) {
                $request->session()->put('user',Auth::user());
                return $next($request);
        }

        return redirect()->route('login')->with('error', 'You do not have access to this page.');
    }
}
