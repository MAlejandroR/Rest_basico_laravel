<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateJsonApiContentType
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('Accept') !== 'application/vnd.api+json') {
            return response()->json(
                ["errors" => [
                    "status" => "406",
                    "title" => "Not Acceptable",
                    "detail" => "Header without Accept concept"
                ]],
                406
            );
        }
        return $next($request);
    }

}
