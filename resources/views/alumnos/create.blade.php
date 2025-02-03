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
                    <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido"/>
                </div>
                <div>
                    <x-input-label for="fnac" :value="__('Fecha de Nacimiento')"/>
                    <x-text-input id="fnac" class="block mt-1 w-full" type="date" name="fecha_nacimiento"/>
                </div>
                <div>
                    <x-input-label for="fnac" :value="__('DNI')"/>
                    <x-text-input id="fnac" class="block mt-1 w-full" type="text" name="dni"/>
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"/>
                    @error("email")
                      <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <input class="btn btn-success" type="submit" value="Guardar">
                <a href="{{route("alumnos.index")}}" class="btn btn-success"> Volver </a>
        </div>
        </form>
    </div>
    </div>
</x-layouts.layout>
