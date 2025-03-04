<div class="mb-4 p-4 bg-white rounded-lg shadow" id="comentario-{{ $comentario->id }}">
    <p class="text-gray-700"><strong>{{ $comentario->user->name }}:</strong> {{ $comentario->contenido }}</p>
    <p class="text-gray-500 text-sm">{{ $comentario->created_at->timezone('Europe/Madrid')->format('d/m/Y H:i') }}</p>
    {{-- <button onclick="setCommentable({{ $comentario->id }}, 'App\\Models\\Comentario', {{ $comentario->id }})" class="ml-2 px-2 py-1 bg-gray-500 text-white rounded">Responder</button> --}}

    <div class="bg-gray-100 p-4 rounded-lg shadow">
        <form action="{{ route('comentarComentario', $comentario, ) }}" method="POST" id="commentForm" >
            @csrf
            <div class="mb-4">
                <label for="contenido" class="block text-gray-700">Añadir comentario:</label>
                <textarea id="contenido" name="contenido" rows="4" class="w-full mt-2 p-2 border rounded-lg" required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Enviar</button>
            </div>
        </form>
        @can('delete', $comentario)
            <form method="POST" action="{{ route('comentarios.destroy', $comentario) }}">
                @method('DELETE')
                @csrf
                <a href="{{ route('comentarios.destroy', $comentario) }}"
                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3"
                    onclick="event.preventDefault(); if (confirm('¿Está seguro?')) this.closest('form').submit();">
                    Eliminar
                </a>
            </form>
        @endcan
    </div>
    @if ($comentario->comentarios->isNotEmpty())
        <div class="ml-4">
            @foreach ($comentario->comentarios as $subComentario)
                <x-comentario :comentario="$subComentario" />
            @endforeach
        </div>
    @endif

</div>
