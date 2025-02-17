<x-layouts.layout>
    @if ($errors->any)
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    @endif
    <div class="flex flex-col justify-center items-center bg-gray-200 h-full">
        <div class="bg-white rounded p-5">
            <form method="POST" action="{{ route('alumnos.update',$alumno)}}">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <!--Datos personales-->
                <div>
                    <x-input-label for="nombre"  value="Nombre" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                  value="{{$alumno->nombre}}" />
                    @error("nombre")
                    <div class="text-danger">{{ $message }}</div>

                    @enderror
                </div>
                <div>
                    <x-input-label for="apellido" value="Apellido"/>
                    <x-text-input id="apellido" class="block mt-1 w-full" type="text" value="{{$alumno->apellido}}" name="apellido"/>
                </div>
                <div>
                    <x-input-label for="fnac" value="Fecha de Nacimiento" />
                    <x-text-input id="fnac" class="block mt-1 w-full" type="date" name="fecha_nacimiento" value="{{$alumno->fecha_nacimiento}}"/>
                </div>
                <div>
                    <x-input-label for="dni" value="DNI"/>
                    <x-text-input id="fnac" class="block mt-1 w-full" type="text" name="dni" value="{{old('dni',$alumno->dni)}}" />
                </div>
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$alumno->email}}"/>
                    @error("email")
                      <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                {{--IDIOMAS (Del fichero de configuración --}}

                {{--            Idiomas que habla el alumno--}}

                <div class="border rounded-lg max-h-[200px] overflow-y-auto shadow-sm">
                    <table class="min-w-full divide-y divide-gray-300">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Idioma
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nivel
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Titulo
                        </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-700">
                        <tbody>
                        @php
                            $idiomas = collect(config("idiomas"))->sortByDesc(fn($idioma) => $alumno->idiomas->pluck("idioma")->contains($idioma));
                        @endphp
                        <table>
                            @foreach($idiomas as $idioma)
                                <tr x-data="{ checked: {{ $alumno->idiomas->pluck('idioma')->contains($idioma) ? 'true' : 'false' }} }">
                                    <td>
                                        <input type="checkbox" x-model="checked" value="{{$idioma}}" name="idiomas[]">
                                        {{ $idioma }}
                                    </td>
                                    <td>
                                        <select name="niveles[]" x-bind:disabled="!checked">
                                            <option value="Básico">Básico</option>
                                            <option value="Medio">Medio</option>
                                            <option value="Alto">Alto</option>
                                            <option value="Bilingüe">Bilingüe</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="titulos[]" x-bind:disabled="!checked">
                                            <option value=null>Sin Título</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="B1">B1</option>
                                            <option value="B2">B2</option>
                                            <option value="C1">C1</option>
                                            <option value="Bilingüe">Bilingüe</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        </tbody>
                    </table>
                </div>
        </div> {{--End div idiomas--}}


    </div> {{--End div de sección de datos e idiomas grid 2--}}




        <!-- Acciones -->
                <input class="btn btn-success" type="submit" value="Guardar">
                <a href="{{route("alumnos.index")}}" class="btn btn-success"> Volver </a>
        </form>
    </div>
    </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll(".idioma-checkbox").forEach(function (checkbox) {
                    checkbox.addEventListener("change", function () {
                        let rowIndex = this.getAttribute("data-row");
                        let nivelSelect = document.querySelector(`.nivel-select[data-row='${rowIndex}']`);
                        let tituloSelect = document.querySelector(`.titulo-select[data-row='${rowIndex}']`);

                        if (this.checked) {
                            nivelSelect.removeAttribute("disabled");
                            tituloSelect.removeAttribute("disabled");
                        } else {
                            nivelSelect.setAttribute("disabled", "true");
                            tituloSelect.setAttribute("disabled", "true");
                        }
                    });
                });
            });
        </script>
</x-layouts.layout>
