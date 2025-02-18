<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver cuenta
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Número
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $cuenta->numero }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>


<div class="relative overflow-x-auto mt-10">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Movimientos
    </h2>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Concepto
                </th>
                <th scope="col" class="px-6 py-3">
                    Importe
                </th>
                <th scope="col" class="px-6 py-3">
                    Saldo parcial
                </th>
            </tr>
        </thead>
        <tbody>
            @php
                $saldoParcial = 0;
                $movimientos = $cuenta->movimientos()->orderBy('created_at')->get();
            @endphp
            @foreach ($movimientos as $movimiento)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $movimiento->created_at }}
                </th>
                <td class="px-6 py-4">
                    {{ $movimiento->concepto }}
                </td>
                <td class="px-6 py-4">
                    {{ $movimiento->importe }} €
                </td>
                @php
                    $saldoParcial += $movimiento->importe;
                @endphp
                <td class="px-6 py-4">
                    {{ $saldoParcial }} €
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
    </div>
</x-app-layout>
