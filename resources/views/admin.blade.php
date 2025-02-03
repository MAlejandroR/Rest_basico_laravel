<x-layouts.layout >
    <div class="p-5">
    <div class="card bg-base-100 image-full w-96 shadow-xl">
        <figure>
            <img
                src="{{asset("images/alumnos.avif")}}"
                alt="Shoes" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">CRUD Alumnos</h2>
            <p>Aquí gestionamos un crud sencillo de Alumnos</p>
            <div class="card-actions justify-end">
                <a class="btn btn-primary" href="/alumnos">Gestionar Alumnos</a>
            </div>
        </div>
    </div>
    </div>
</x-layouts.layout>
