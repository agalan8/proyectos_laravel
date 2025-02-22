<div>
    <!-- Filtro de búsqueda -->
    <input type="text" wire:model.live="search" placeholder="Buscar..." class="mb-4 px-4 py-2 border border-gray-300 rounded-lg">

    <select wire:model.live="searchField" class="mb-4 px-4 py-2 border border-gray-300 rounded-lg">
        <option value="codigo">Código</option>
        <option value="aeropuerto_origen">Aeropuerto de origen</option>
        <option value="aeropuerto_destino">Aeropuerto de destino</option>
        <option value="compañia_aerea">Compañía</option>
    </select>

    <!-- Tabla de vuelos -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('codigo')">
                        Código
                        @if ($sortField === 'codigo')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('aeropuerto_origen')">
                        Aeropuerto de origen
                        @if ($sortField === 'aeropuerto_origen')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('aeropuerto_destino')">
                        Aeropuerto de destino
                        @if ($sortField === 'aeropuerto_destino')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('compañia_aerea')">
                        Compañía
                        @if ($sortField === 'compañia_aerea')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('plazas_totales')">
                        Plazas
                        @if ($sortField === 'plazas_totales')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plazas Libres
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('precio')">
                        Precio
                        @if ($sortField === 'precio')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th colspan="3" scope="col" class="px-6 py-3">
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vuelos as $vuelo)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $vuelo->codigo }}</td>
                        <td class="px-6 py-4">{{ $vuelo->aeropuerto_origen }}</td>
                        <td class="px-6 py-4">{{ $vuelo->aeropuerto_destino }}</td>
                        <td class="px-6 py-4">{{ $vuelo->compañia_aerea }}</td>
                        <td class="px-6 py-4">{{ $vuelo->plazas_totales }}</td>
                        <td class="px-6 py-4">{{ $vuelo->quedanLibres() }}</td>
                        <td class="px-6 py-4">{{ $vuelo->precio }}€</td>
                        <td class="px-6 py-4">
                            <!-- Opciones -->
                            <a href="{{ route('vuelos.edit', $vuelo) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <form method="POST" action="{{ route('vuelos.destroy', $vuelo) }}" class="inline-block">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('vuelos.destroy', $vuelo) }}"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3"
                                    onclick="event.preventDefault(); if (confirm('¿Está seguro?')) this.closest('form').submit();">
                                    Eliminar
                                </a>
                            </form>
                            {{-- @if ($vuelo->plazasLibres())
                                <a href="{{ route('vuelos.reserva', $vuelo) }}" class="ml-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Reservar</a>
                            @endif --}}
                            @can('view', $vuelo)
                            <a href="{{ route('vuelos.reserva', $vuelo) }}" class="ml-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Reservar</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $vuelos->links() }}
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('vuelos.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Crear un nuevo vuelo
        </a>
    </div>
</div>
