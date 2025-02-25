<div>
    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Aula origen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aula destino
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenador->cambios as $cambio)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $cambio->origen_id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $cambio->destino_id }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" wire:click="eliminarHistorial" class="mt-10 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar historial</button>
    </div>
</div>
