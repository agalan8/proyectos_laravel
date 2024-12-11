<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver libro
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Titulo
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $libro->titulo }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Autor
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $libro->autor }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>


    @if ($libro->ejemplares()->exists())

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ejemplares
            </h2>
            <br>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Codigo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha préstamo
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libro->ejemplares as $ejemplar)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                <a href="{{route('ejemplares.show', $ejemplar)}}">
                                    {{ $ejemplar->codigo }}
                                </a>
                            </td>
                        @if ($ejemplar->prestamos()->where('fecha_hora_devolucion', null)->first())

                            <td class="px-6 py-4">
                                {{ 'Prestado' }}
                            </td>

                            @else

                            <td class="px-6 py-4">
                                {{ 'No prestado' }}
                            </td>
                        @endif
                        @if($ejemplar->prestamos()->exists())
                            <td class="px-6 py-4">
                                {{ $ejemplar->prestamos->last()->fecha_hora }}
                            </td>
                        </tr>
                        @else
                            <td class="px-6 py-4">
                                {{ '' }}
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

    @endif
</x-app-layout>
