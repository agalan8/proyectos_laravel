<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver ordenador
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Marca
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $ordenador->marca }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Modelo
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $ordenador->modelo }}
                            </dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Aula
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $ordenador->aula->nombre }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cambios
            </h2>
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @livewire('historial-eliminar', [
                        'ordenadorId' => $ordenador->id
                    ])
                </div>
            </div>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dispositivos
            </h2>

            <div class="relative overflow-x-auto mt-10">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenador->dispositivos as $dispositivo)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $dispositivo->nombre }}
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
        </div>
    </div>
</x-app-layout>
