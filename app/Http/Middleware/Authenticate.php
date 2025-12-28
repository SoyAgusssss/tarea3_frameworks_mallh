<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * Maneja la autenticación fallida.
     */
    protected function unauthenticated($request, array $guards): Response
    {
        // Devuelve JSON 401 en todas las peticiones API
        return response()->json(['message' => 'No autenticado'], 401);
    }
}





