<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoApiRequest;
use App\Http\Resources\AlumnoCollection;
use App\Http\Resources\AlumnoResource;
use App\Models\Alumno;
use Illuminate\Http\Request;
/**
 * @OA\Info(
 *      title="Api de Alumnos",
 *      description="Interactuar con los Alumnos de nuestra aplicación",
 *      version="1.0.0",
 *      @OA\Contact(
 *          email="manuelromeromiguel@gmail.com"
 *      ),
 *      @OA\License(
 *          name="MIT",
 *          url="https://opensource.org/license/mit"
 *      )
 * )

 *     @OA\Schema(
 *         schema="Alumno",
 *         type="object",
 *         required={"id", "name", "email"},
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="name", type="string", example="Juan Pérez"),
 *         @OA\Property(property="email", type="string", example="juan@example.com")
 *     )

 */


class AlumnoApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/alumnos",
     *      operationId="getAllStudents",
     *      tags={"Alumnos"},
     *      summary="Obtener todos los alumnos",
     *      @OA\Response(
     *          response=200,
     *          description="Éxito",
     *          @OA\MediaType(
     *              mediaType="application/vnd.api+json",
     *              @OA\Schema(
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Alumno")

     *              )
     *          )
     *      )
     * )
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
    public function store(StoreAlumnoApiRequest $request)
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
