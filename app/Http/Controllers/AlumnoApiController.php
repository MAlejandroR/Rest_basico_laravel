<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlumnoCollection;
use App\Http\Resources\AlumnoResource;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Http\Requests\StoreAlumnoRequest;

class AlumnoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return new AlumnoCollection($alumnos);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $alumno=Alumno::create($request->input("data.attributes"));
        return new AlumnoResource($alumno);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $resouce = Alumno::find($id);
        if (!$resouce) {
            return response()->json([
                'errors' => [
                    [
                        'status' => '404',
                        'title' => 'Resource Not Found',
                        'detail' => 'The requested resource does not exist or could not be found.'
                    ]
                ]
            ], 404);
            return     new AlumnoResource($resource);

        }
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
