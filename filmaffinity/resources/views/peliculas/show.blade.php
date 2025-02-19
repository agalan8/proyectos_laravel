<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver película
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Título
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $pelicula->ficha->titulo }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Descripción
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $pelicula->ficha->descripcion }}
                            </dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Director
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $pelicula->director }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>


{{-- <div class="relative overflow-x-auto mt-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Texto
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellidos
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departamento->empleados as $empleado)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $empleado->numero }}
                </th>
                <td class="px-6 py-4">
                    {{ $empleado->nombre }}
                </td>
                <td class="px-6 py-4">
                    {{ $empleado->apellidos }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

@foreach ($pelicula->ficha->comentarios as $comentario)

    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $comentario->user->name}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $comentario->texto }}</p>
        <a href="{{ route('comentarios.edit', $comentario) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
            Editar
        </a>
        <form method="POST" action="{{ route('comentarios.destroy', $comentario) }}">
            @method('DELETE')
            @csrf
            <a href="{{ route('comentarios.destroy', $comentario) }}"
                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3"
                onclick="event.preventDefault(); if (confirm('¿Está seguro?')) this.closest('form').submit();">
                Eliminar
            </a>
    </div>

    @endforeach

    <div class="mt-6 text-center">
        <form method="POST" action="{{ route('comentarios.crear', $pelicula) }}" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <textarea id="texto" name="texto" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Comentario..."></textarea>
                <x-input-error :messages="$errors->get('texto')" class="mt-2" />
            </div>
            <button type="submit" style="background-color: black, color:white">
                Crear
            </button>
        </form>
    </div>

        </div>
    </div>
</x-app-layout>
