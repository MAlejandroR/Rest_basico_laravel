<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;
use function PHPUnit\Framework\isInstanceOf;

class ForceHeaderResponseJsonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response= $next($request);
        if ($response instanceof Response || $response instanceof JsonResponse) {
            $response->headers->set('Content-Type', 'application/vnd.api+json');
        }
        return $response;
    }
}
