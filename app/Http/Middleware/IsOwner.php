<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsOwner
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
        if (Auth::check() == true) {
            if (Auth::user()->level == 'owner') {
                return $next($request);
            } else {
                return redirect('/')->with('notif-x', 'maaf anda bukan pemilik!');
            }
        } else {
            return redirect('login')->with('notif-x', 'login terlebih dahulu!');
        }
    }
}
