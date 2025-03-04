<div>
    {{-- {{ dump($pista) }} --}}

    <select wire:model.live='pista_id' name="pista_id">
        <option value=''>Selecciona una pista...</option>
        @foreach ($pistas as $pista)
            <option value='{{ $pista->id }}'>{{ $pista->nombre }}</option>
        @endforeach
    </select>
    @if ($pista_id !== '')
        <table style="border: 1px solid black">
            <thead>
                <th>HORARIO</th>
                <th>LUNES</th>
                <th>MARTES</th>
                <th>MIERCOLES</th>
                <th>JUEVES</th>
                <th>VIERNES</th>
            </thead>
            <tbody>
                @foreach ($tabla as $hora => $fila)
                    <tr>
                        <td>{{ $hora }}:00</td>
                        @foreach ($fila as $celda)
                            <td>
                                @if ($celda::class == \Illuminate\Support\Carbon::class)
                                    <button wire:click="reservar('{{ $celda }}')">Reservar</button>
                                @else
                                    @if ($celda->user == Illuminate\Support\Facades\Auth::user())
                                        <button wire:click="eliminar({{ $celda->id }})">Eliminar</button>
                                    @else
                                        Reservado
                                    @endif
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>



{{-- <div>
    {{ dump($pista) }}

    <div class="mb-4">
        <label for="pista_id" class="block text-sm font-medium text-gray-700">Selecciona una pista</label>
        <select wire:model.live='pista_id' name="pista_id" id="pista_id" class="mt-1 block rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value=''>Selecciona una pista...</option>
            @foreach ($pistas as $pista)
                <option value='{{ $pista->id }}'>{{ $pista->nombre }}</option>
            @endforeach
        </select>
    </div>

    @if ($pista_id !== '')
        <div class="overflow-x-auto shadow-md sm:rounded-lg mt-6">
            <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-100 text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">HORARIO</th>
                        <th scope="col" class="px-6 py-3">LUNES</th>
                        <th scope="col" class="px-6 py-3">MARTES</th>
                        <th scope="col" class="px-6 py-3">MIERCOLES</th>
                        <th scope="col" class="px-6 py-3">JUEVES</th>
                        <th scope="col" class="px-6 py-3">VIERNES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tabla as $hora => $fila)
                        <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4">{{ $hora }}:00</td>
                            @foreach ($fila as $celda)
                                <td class="px-6 py-4">
                                    @if ($celda::class == \Illuminate\Support\Carbon::class)
                                        <button wire:click="reservar('{{ $celda }}')" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-800">
                                            Reservar
                                        </button>
                                    @else
                                        @if ($celda->user == Illuminate\Support\Facades\Auth::user())
                                            <button wire:click="eliminar({{ $celda->id }})" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300 dark:focus:ring-red-800">
                                                Eliminar
                                            </button>
                                        @else
                                            <span class="text-gray-500">Reservado</span>
                                        @endif
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div> --}}
