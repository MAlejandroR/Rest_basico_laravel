<?php

use App\Http\Middleware\ForceHeaderResponseJsonMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use App\Http\Middleware\ValidateJsonApiContentType;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Middleware\ThrottleRequests;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web([LanguageMiddleware::class]);
        $middleware->api(append: [
            ValidateJsonApiContentType::class,
            ThrottleRequests::class . ':200,1',
            ForceHeaderResponseJsonMiddleware::class, // ← Corregido
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(fn(QueryException $e) => handleDatabaseError($e)); // ← Corregido
        $exceptions->render(fn(ValidationException $e) => handleValidationError($e));
    })
    ->create();

// Función global para manejar errores de base de datos
function handleDatabaseError(QueryException $e)
{
    return response()->json([
        "errors" => [
            "status" => "500",
            "title" => "Database Error",
            "detail" => "Error procesando la respuesta, inténtalo más tarde"
        ]
    ], 500); // ← Corregido, 500 va afuera del array
}
// Método para manejar errores de validación
function handleValidationError(ValidationException $e)
{
    return response()->json([
        'errors' => collect($e->errors())->map(function ($message, $field) {
            return [
                'status' => '422',
                'title'  => 'Validation Error',
                'detail' => $message[0],
                'source' => [
                    'pointer' => '/data/attributes/' . $field
                ]
            ];
        })->values()
    ], $e->status);
}
