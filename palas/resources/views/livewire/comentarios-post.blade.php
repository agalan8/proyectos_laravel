<div>
    <div class="py-12 flex justify-center">
        <div class="max-w-4xl w-full">
            <div class="mb-4">
                <label for="contenido" class="block text-gray-700">Añadir comentario:</label>
                <textarea wire:model="contenido" id="contenido" name="contenido" rows="4" class="w-full mt-2 p-2 border rounded-lg" required></textarea>
            </div>
            <div class="flex justify-end">
                <button wire:click="comentarPost" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Enviar</button>
            </div>

            <h3 class="text-2xl font-semibold text-gray-800 leading-tight mb-4">Comentarios</h3>
            <div id="comments">
                @foreach ($comentarios as $comentario)
                    @livewire('ComentariosComentario', [
                        'comentario_id' => $comentario->id
                    ])
                @endforeach
            </div>
        </div>
    </div>
</div>
