<x-app-layout>
    <div class="w-1/2 mx-auto">
        <!-- Título -->
        <div>
            <x-input-label for="titulo" :value="'Título del libro'" />
            <x-text-input id="titulo" class="block mt-1 w-full"
                type="text" name="titulo" :value="$libro->titulo" required
                readonly autofocus autocomplete="titulo" />
        </div>

        <!-- Autor -->
        <div class="mt-4">
            <x-input-label for="autor" :value="'Autor del libro'" />
            <x-text-input id="autor" class="block mt-1 w-full"
                type="text" name="autor" :value="$libro->autor" required
                readonly autofocus autocomplete="autor" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('libros.index') }}">
                <x-secondary-button class="ms-4">
                    Volver
                </x-primary-button>
            </a>
        </div>

        <table class="mt-8 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Código del ejemplar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ¿Está prestado?
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha del préstamo
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libro->ejemplares as $ejemplar)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ truncar($ejemplar->codigo) }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($ejemplar->prestamosVigentes()->count() > 0)
                                Sí
                            @else
                                No
                            @endif
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($ejemplar->prestamos->isNotEmpty())
                                {{ $ejemplar->prestamos->first()->created_at }}
                            @endif
                        </td>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
