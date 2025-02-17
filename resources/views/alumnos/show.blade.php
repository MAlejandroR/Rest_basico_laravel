<x-layouts.layout>
    <div class="flex flex-col justify-center items-center bg-gray-200 h-full">
        <div class="bg-white rounded p-5 m-5 p-5  w-full max-w-[100vh]">
            <h2 class="text-2xl text-center font-bold mb-6">{{ __('Detalles del Alumno') }}</h2>
            <hr class="h-2 my-3 bg-gray-500 rounded-xl l">
            <!-- Información del Alumno -->
                <h3 class="text-lg font-semibold mb-4">Información Personal</h3>
                <div class="grid grid-cols-2 gap-4 ">

                    {{--                    Datos personales--}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="font-semibold">Nombre:</p>
                            <p>{{ $alumno->nombre }} {{ $alumno->apellido }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">DNI:</p>
                            <p>{{ $alumno->dni }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Email:</p>
                            <p>{{ $alumno->email }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Fecha de Nacimiento:</p>
                            <p>{{ $alumno->fecha_nacimiento }}</p>
                        </div>
                    </div> {{--Fin div datos personales alumno--}}

                    {{--            Idiomas que habla el alumno--}}

                    <div class="border rounded-lg max-h-[300px] overflow-y-auto shadow-sm">

                        <table class="min-w-full divide-y divide-gray-300">

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Idioma</th>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nivel</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titulo</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-700">
                            <tbody>

                            @foreach($alumno->idiomas as $idioma)
                                <tr class="hover:bg-gray-100">
                                    <td>
                                        {{$idioma->idioma}}
                                    </td>
                                    <td>{{$idioma->nivel}}</td>
                                    <td>{{$idioma->titulo}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div> {{--End div idiomas--}}


                </div> {{--End div de sección de datos e idiomas grid 2--}}

                <!-- Botones de Acción -->
                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('alumnos.edit', $alumno) }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Editar Alumno
                    </a>
                    <a href="{{ route('alumnos.index') }}"
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Volver al Listado
                    </a>
                </div> {{--End div botones o acciones--}}
            </div>
        </div>
</x-layouts.layout>

