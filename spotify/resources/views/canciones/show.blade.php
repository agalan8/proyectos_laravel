<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver canción
        </h2>
    </x-slot>

    {{-- @php
     dd($cancion);
    @endphp --}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Nombre
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $cancion->nombre }}
                            </dd>
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Duración
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $cancion->duracion }}
                            </dd>
                        </div>
                        <h2 class="mt-10 font-semibold text-xl text-gray-800 leading-tight">
                            Artistas de la canción
                        </h2>
                        <div class="pt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($cancion->artistas as $artista)

                            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white dark:bg-gray-800">
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
                            </div>


                            @endforeach
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
