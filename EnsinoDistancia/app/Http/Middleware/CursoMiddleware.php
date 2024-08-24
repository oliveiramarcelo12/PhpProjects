<?php

// app/Http/Middleware/IsProfessor.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CursoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (Auth::user()->user_type === 'professor' || Auth::user()->user_type === 'student')) {
            return $next($request);
        }

        return redirect()->route('home')->withErrors(['access' => 'Você não tem permissão para acessar esta área.']);
    }
}


