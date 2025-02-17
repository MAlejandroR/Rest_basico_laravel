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

            <!-- Session Status -->
            <form method="POST" action="{{ route('alumnos.store') }}">
                @csrf
                <div class="grid grid-cols-2 gap-4 divide-x ">
                    {{--                    Datos de alumno--}}
                    <div class="grid grid-cols-2 gap-4">
                <!-- Nombre-->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')"/>
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                          value="{{old('nombre')}}"/>
                            @error("nombre")
                            <div class="text-danger">{{ $message }}</div>

                            @enderror
                        </div>
                        <div>
                            <x-input-label for="apellido" :value="__('Apellido')"/>
                            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" value="{{old('apellido')}}" />
                        </div>
                        <div>
                            <x-input-label for="fnac" :value="__('Fecha de Nacimiento')"/>
                            <x-text-input id="fnac" class="block mt-1 w-full" type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}"/>
                        </div>
                        <div>
                            <x-input-label for="fnac" :value="__('DNI')"/>
                            <x-text-input id="fnac" class="block mt-1 w-full" type="text" name="dni" value="{{old('dni')}}"/>
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email')}}"/>
                            @error("email")
                              <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                        {{--                    Idiomas--}}
                    <div class="max-h-96 overflow-y-auto px-4 text-sm">
                        <h2 class="font-semibold text-lg mb-2">Listado de idiomas</h2>
                        <div x-data="{ idiomas: {} }">
                        @foreach(config("idiomas") as $idioma)
                            <div class="flex items-center gap-3 border-b py-2">
                                <input type="checkbox" name="idiomas[]" id="idioma_{{$loop->index}}" value="{{$idioma}}" x-model="idiomas['{{$idioma}}']"
                                >
                                <label for="idioma_{{$loop->index}}" class="flex-grow">{{$idioma}}</label>
                                <template x-if="idiomas['{{$idioma}}']">
                                    <div>
                                    <select name="nivel[{{$idioma}}]" class="border rounded text-sm">
                                        <option disabled selected value="">Nivel</option>
                                        <option value="Básico">Básico</option>
                                        <option value="Medio">Medio</option>
                                        <option value="Alto">Alto</option>
                                    </select>

                                    <select name="titulo[{{$idioma}}]" class="border rounded text-sm">
                                        <option disabled selected value="">Título</option>
                                        <option value="A1">A1</option>
                                        <option value="A2">A2</option>
                                        <option value="B1">B1</option>
                                    </select>
                                    </div>
                                </template>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <!-- Botones -->
                <hr class="h-1 bg-green-800 rounded-sm m-3 ">


                <input class="btn btn-success" type="submit" value="Guardar">
                <a href="{{route("alumnos.index")}}" class="btn btn-success"> Volver </a>


            </form>

        </div>
    </div>
</x-layouts.layout>
