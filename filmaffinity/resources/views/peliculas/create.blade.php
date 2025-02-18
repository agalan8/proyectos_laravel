<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear película
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('peliculas.store') }}" class="max-w-sm mx-auto">
                @csrf
                <div class="mb-5">
                    <x-input-label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Título
                    </x-input-label>
                    <x-text-input name="titulo" type="text" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('titulo')" />
                    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <x-input-label for="denominacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Descripción
                    </x-input-label>
                    <x-text-input name="descripcion" type="text" id="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('descripcion')" />
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <x-input-label for="director" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Director
                    </x-input-label>
                    <x-text-input name="director" type="text" id="director" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('director')" />
                    <x-input-error :messages="$errors->get('director')" class="mt-2" />
                </div>
                <button type="submit" style="background-color: black, color:white">
                    Crear
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
