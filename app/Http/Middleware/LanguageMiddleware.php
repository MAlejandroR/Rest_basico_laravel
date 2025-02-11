<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */


    public function handle(Request $request, Closure $next): Response
    {

        info ("03 En middleware variable de sesion ", session()->all());

        if (session()->has('locale')) {
            $locale=session('locale');
            App::setLocale($locale);
            Log::info("Idioma cargado correctamente desde sesión: " . $locale);
        } else {
            $locale=config('app.locale', 'es'); // Idioma predeterminado si no existe en sesión
            session()->put('locale', $locale);
            session()->save(); // Guardar la sesión después de actualizarla
            Log::info("Idioma no encontrado en sesión, se asigna: " . $locale);
        }

        return $next($request);
    }

//        Log::info("Idioma en sesión: en middleware "); // Registrar el idioma en
//
//        if (session()->has('locale')) {
//            $locale=session('locale');
//            app()->setLocale($locale);
//            Log::info("Idioma en sesión: " . $locale); // Registrar el idioma en logs
//        }
//
//    else {
//        $locale = App::getLocale();
//        session()->put('locale', $locale);
//        Log::info("Idioma en sesión else -$locale-"); // Registrar el idioma en
//
//    }
//        return $next($request);
//    }

}
