<div>
    <div class="mt-7 ml-7">
        <label for="videojuego_id">Videojuegos</label>
        <select wire:model.live="videojuego_id" id="videojuego_id" name="videojuego_id">
            <option value="" selected disabled>Selecciona un videojuego</option>
            @foreach ($videojuegos as $videojuego)
                <option value="{{ $videojuego->id }}" >{{ $videojuego->titulo }}</option>
            @endforeach
        </select>
        <button type="button" wire:click="lotengo" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Lo tengo</button>
        <button type="button" wire:click="nolotengo" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">NO lo tengo</button>
    </div>
</div>
