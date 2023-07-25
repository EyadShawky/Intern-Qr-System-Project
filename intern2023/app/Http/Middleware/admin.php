<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()){
            return redirect(route('login'));
        }
    
        if (auth()->user()->role->name == 'Super-Admin' || auth()->user()->role->name == 'Admin'){
            return $next($request);
        }
        return redirect(route('form'));
        
    }


    public function logout(){
        Auth::logout();
        return redirect(url('/admin/pdRkAAT+XxepOb8drasiSw==/login'));
    }
}
