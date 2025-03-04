<div>
    @if ($comentario != null)

    <div class="mb-4 p-4 bg-white rounded-lg shadow">
        <p class="text-gray-700"><strong>{{ $comentario->user->name }}:</strong> {{ $comentario->contenido }}</p>
        <p class="text-gray-500 text-sm">{{ $comentario->created_at->timezone('Europe/Madrid')->format('d/m/Y H:i') }}</p>

        <div class="bg-gray-100 p-4 rounded-lg shadow">
            <div class="mb-4">
                <label for="contenido" class="block text-gray-700">Añadir comentario:</label>
                <textarea wire:model="contenido" id="contenido" name="contenido" rows="4" class="w-full mt-2 p-2 border rounded-lg" required></textarea>
            </div>
            <div class="flex justify-end">
                <button wire:click="comentarComentario({{ $comentario }})" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Enviar</button>
            </div>
            @can('delete', $comentario)
            <button wire:click="eliminarComentario({{ $comentario }})" class="px-4 py-2 bg-red-500 text-white rounded-lg">Eliminar</button>
            @endcan
        </div>
        @php
            dump($comentarios);
            @endphp
        @if ($comentarios->isNotEmpty())
            <div class="ml-4">
                @foreach ($comentarios as $subComentario)
                    @livewire('ComentariosComentario', [
                        'comentario_id' => $subComentario->id
                    ])
                @endforeach
            </div>
        @endif

    </div>
    @endif
</div>
