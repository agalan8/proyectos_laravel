<div x-data="{ open: false }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Libros
        </h2>
    </x-slot>

    <form wire:submit="{{ $estaEditando ? 'actualizar' : 'crear' }}">
        <div>
            <label for="codigo">Código: </label>
            <input wire:model="codigo" type="text" id="codigo" name="codigo">
        </div>
        <div>
            <label for="titulo">Título: </label>
            <input wire:model="titulo" type="text" id="titulo" name="titulo">
        </div>
        <div>
            <label for="numpags">Núm. páginas: </label>
            <input wire:model="numpags" type="text" id="numpags" name="numpags">
        </div>
        <button type="submit" @click="open = ! open">{{ $estaEditando ? 'Editar' : 'Crear' }}</button>
        <button wire:click.prevent="cancelar" @click="open = ! open">Cancelar</button>
    </form>

    <div>
        <table>
            <thead>
                <th>Código</th>
                <th>Título</th>
                <th>Núm. páginas</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                <tr>
                    <td>{{ $libro->codigo }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->numpags }}</td>
                    <td><a href="#" wire:confirm="¿Seguro?" wire:click="eliminar({{ $libro->id }})">Eliminar</a></td>
                    <td><a href="#" wire:click="editar({{ $libro->id }})" @click="open = ! open">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div :class="{ 'hidden': ! open }">
        <form wire:submit="actualizar">
            <div>
                <label for="codigo">Código: </label>
                <input wire:model="codigo" type="text" id="codigo" name="codigo">
            </div>
            <div>
                <label for="titulo">Título: </label>
                <input wire:model="titulo" type="text" id="titulo" name="titulo">
            </div>
            <div>
                <label for="numpags">Núm. páginas: </label>
                <input wire:model="numpags" type="text" id="numpags" name="numpags">
            </div>
            <button type="submit">Crear</button>
        </form>
    </div> --}}
</div>
