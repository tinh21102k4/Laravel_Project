<?php

namespace App\Http\Middleware;

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
        if (Auth::check()) {
            if (Auth::User()->role == '1') {
                return $next($request);
            }elseif(Auth::User()->role == '2'){
                return redirect()->route('client.home');
            }
        }
        return redirect()->route('login')->with([
            'errorsMessage' => 'Tài khoản không tồn tại !!!'
        ]);
    }
}
