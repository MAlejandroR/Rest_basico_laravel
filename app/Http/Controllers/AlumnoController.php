<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use App\Models\Idioma;
use Illuminate\Support\Facades\Schema;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $campos = Schema::getColumnListing('alumnos');
        $exlude=["created_at","updated_at"];
        $campos = array_diff($campos, $exlude);
        $filas = Alumno::select($campos)->get();
        $tabla =(new Alumno())->getTable();

        return view('alumnos.index', compact('filas','campos','tabla'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('alumnos.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $datos = $request->input();
        $alumno = new Alumno ($datos);
        $alumno->save();
        if ($request->has('idiomas'))
            foreach ($request->idiomas as $idioma_hablado) {
                info("Guardando $idioma_hablado");
                $idioma=new Idioma ();
                $idioma->alumno_id=$alumno->id;
                $idioma->idioma=$idioma_hablado;
                $idioma->titulo=$request->titulo[$idioma_hablado];
                $idioma->nivel=$request->nivel[$idioma_hablado];
                $idioma->save();
            }
        session()->flash("mensaje", "Alumno creado con ");
        return redirect()->route('alumnos.index');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view("alumnos.show", compact('alumno'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {

        return view ('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $datos = $request->input();
        dd($datos);
        $alumno->update($datos);
        session()->flash("mensaje", "Alumno actualizado");
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        session()->flash("mensaje", "Alumno eliminado");
        return redirect()->route('alumnos.index');
    }
}
