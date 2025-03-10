<div>
    <form wire:submit.prevent="crearVideo">
        <div>
            <label>Título del Video:</label>
            <input type="text" wire:model="titulo" class="border p-2">
            @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label>Selecciona las Categorías:</label>
            @foreach($categorias as $categoria)
                <div>
                    <input type="checkbox" wire:model="categoriasSeleccionadas" value="{{ $categoria->id }}">
                    <span>{{ $categoria->nombre }}</span>
                </div>
            @endforeach
            @error('categoriasSeleccionadas') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4">Crear Video</button>
    </form>

    @if (session()->has('mensaje'))
        <div class="mt-4 text-green-500">
            {{ session('mensaje') }}
        </div>
    @endif
</div>
