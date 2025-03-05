<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Videojuegos
        </h2>
    </x-slot>

    <form wire:submit="{{ $estaEditando ? 'actualizar' : 'crear' }}">
        <div class="mt-7 ml-7">
            <label for="titulo">Título: </label>
            <input wire:model="titulo" type="text" id="titulo" name="titulo">
            @error('titulo') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-7 ml-7">
            <label for="anyo">Año: </label>
            <input wire:model="anyo" type="text" id="anyo" name="anyo">
            @error('anyo') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-7 ml-7">
            <label for="distribuidora_id">Distribuidora</label>
            <select wire:model.live="distribuidora_id" id="distribuidora_id" name="distribuidora_id">
                <option value="" selected disabled>Selecciona una distribuidora</option>
                @foreach ($distribuidoras as $distribuidora)
                    <option value="{{ $distribuidora->id }}" >{{ $distribuidora->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-7 ml-7">
            <label for="desarrolladora_id">Desarrolladora: </label>
            <select wire:model="desarrolladora_id" id="desarrolladora_id" name="desarrolladora_id">
                <option value="" disabled selected>Selecciona una desarrolladora...</option>
                @foreach ($desarrolladoras as $desarrolladora)
                    <option value="{{ $desarrolladora->id }}" {{ $estaEditando ? ($desarrolladora->id == $videojuego->desarrolladora->id ? 'selected' : '') : ''}}x>{{ $desarrolladora->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button class="mt-7 ml-7" type="submit" @click="open = ! open">{{ $estaEditando ? 'Editar' : 'Crear' }}</button>
        <button class="mt-7 ml-7" wire:click.prevent="cancelar" @click="open = ! open">Cancelar</button>
    </form>

    <div class=" mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('titulo')">
                        Título
                        @if ($sortField === 'titulo')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('anyo')">
                        Año
                        @if ($sortField === 'anyo')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('desarrolladoras.nombre')">
                        Desarrolladora
                        @if ($sortField === 'desarrolladoras.nombre')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('distribuidoras.nombre')">
                        Distribuidora
                        @if ($sortField === 'distribuidoras.nombre')
                            @if ($sortDirection === 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th scope="col" colspan="2" class="px-6 py-3">
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videojuegos as $videojuego)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <a href="{{ route('videojuegos-show', ['videojuegoId' => $videojuego->id]) }}">
                                {{ $videojuego->titulo }}
                            </a>
                        </td>
                        <td class="px-6 py-4">{{ $videojuego->anyo }}</td>
                        <td class="px-6 py-4">{{ $videojuego->desarrolladora->nombre }}</td>
                        <td class="px-6 py-4">{{ $videojuego->desarrolladora->distribuidora->nombre }}</td>
                        <td><a href="#" wire:confirm="¿Seguro?" wire:click="eliminar({{ $videojuego->id }})">Eliminar</a></td>
                        <td><a href="#" wire:click="editar({{ $videojuego->id }})" @click="open = ! open">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
