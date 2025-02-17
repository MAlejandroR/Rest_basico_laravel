@php
    $idiomaAlumno = $alumno->idiomas->firstWhere('idioma', $idioma);
@endphp
<div class="flex flex-col">
    <div class="flex items-center space-x-2">
        <input type="checkbox"
               name="idiomas[]"
               value="{{ $idioma }}"
               {{ $idiomaAlumno ? 'checked' : '' }}
               class="rounded border-gray-300"
               id="idioma_{{ Str::slug($idioma) }}"
        >
        <label for="idioma_{{ Str::slug($idioma) }}">{{ $idioma }}</label>
    </div>

    <!-- Solo mostrar nivel y título si el idioma está marcado -->
    <div class="ml-6 mt-2 {{ !$idiomaAlumno ? 'hidden' : '' }}" id="extra_{{ Str::slug($idioma) }}">
        <label class="block">Nivel</label>
        <select name="niveles[{{ $idioma }}]" class="rounded border-gray-300">
            <option value="bajo" {{ $idiomaAlumno && $idiomaAlumno->hablado === 'bajo' ? 'selected' : '' }}>Bajo</option>
            <option value="medio" {{ $idiomaAlumno && $idiomaAlumno->hablado === 'medio' ? 'selected' : '' }}>Medio</option>
            <option value="alto" {{ $idiomaAlumno && $idiomaAlumno->hablado === 'alto' ? 'selected' : '' }}>Alto</option>
        </select>

        <label class="block mt-2">Título (Opcional)</label>
        <input type="text"
               name="titulos[{{ $idioma }}]"
               value="{{ $idiomaAlumno ? $idiomaAlumno->titulo : '' }}"
               class="rounded border-gray-300 w-full">
    </div>
</div>
