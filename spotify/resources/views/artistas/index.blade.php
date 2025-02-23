<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Galería de Artistas
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($artistas as $artista)

                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white dark:bg-gray-800">
                        <a href="{{ route('artistas.show', $artista) }}">
                        <img class="w-full h-56 object-cover" src="{{ $artista->imagen }}">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl text-gray-900 dark:text-white mb-2">{{ $artista->nombre }}</div>
                        </div>
                        @can('soloAdmin')
                        <a href="{{ route('artistas.edit', $artista) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        <form method="POST" action="{{ route('artistas.destroy', $artista) }}">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('artistas.destroy', $artista) }}"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3"
                                onclick="event.preventDefault(); if (confirm('¿Está seguro?')) this.closest('form').submit();">
                                Eliminar
                            </a>
                        </form>
                        @endcan
                        </a>
                </div>


                @endforeach
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('artistas.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Crear un nuevo artista
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
