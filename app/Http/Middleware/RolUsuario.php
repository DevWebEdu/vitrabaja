<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if ( $request->user()->rol === 1 ){
            // En caso el usuario quiera entrar a notificaciones y sea un dev se redirecciona a Home pagina principal
            return redirect()->route('home');
        }

        return $next($request);
    }
}
