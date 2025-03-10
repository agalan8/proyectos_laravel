<div>
    <form wire:submit.prevent="crearAlbum">
        <div>
            <label>Nombre del Álbum:</label>
            <input type="text" wire:model="nombre" class="border p-2">
            @error('nombre') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label>Selecciona las canciones:</label>
            @foreach($canciones as $cancion)
                <div>
                    <input type="checkbox" wire:model="cancionesSeleccionadas" value="{{ $cancion->id }}">
                    <span>{{ $cancion->titulo }}</span>
                </div>
            @endforeach
            @error('cancionesSeleccionadas') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4">Crear Álbum</button>
    </form>

    @if (session()->has('mensaje'))
        <div class="mt-4 text-green-500">
            {{ session('mensaje') }}
        </div>
    @endif
</div>
