<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PerfilMiddleware
{

    const PERFILES = ["user", "admin"] ;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * admin   true
     * user    false
     */
    public function handle(Request $request, Closure $next, $perfil): Response
    {
        $nombrePerfil = self::PERFILES[ $request->user()->perfil] ;

        if ($nombrePerfil==$perfil) return $next($request) ;
        else                        return redirect()->route("dashboard") ;
    }
}
