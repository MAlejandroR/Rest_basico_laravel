<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function __invoke(Request $request, $locale)
    {
        // Verificar si el idioma está disponible
        info("01 Controlador recibida  variable de sesion $locale");
        $available_locales = config("languages");
        if (array_key_exists($locale, $available_locales)) {
            session()->put('locale', $locale);
            info("02_ Controlador  puesta variable de sesione $locale");
        }
        info("03 fin  Controlador sesiones ", session()->all());

        return redirect()->back();
    }
}

