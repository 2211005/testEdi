<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PageVisit;

class TrackPageVisits
{
    public function handle($request, Closure $next)
    {
        $url = $request->url();

        // Verificar si la página ya ha sido registrada
        $pageVisit = PageVisit::firstOrCreate(['url' => $url]);

        // Incrementar el contador de vistas
        $pageVisit->increment('views');

        return $next($request);
    }
}

