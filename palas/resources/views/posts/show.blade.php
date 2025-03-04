<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver Post
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Título
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $post->titulo }}
                            </dd>
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Descripción
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $post->descripcion }}
                            </dd>
                        </div>
                    </dl>
                    <div class="py-12 flex justify-center">
                        <div class="max-w-4xl w-full">

                            <form action="{{ route('comentarPost', $post) }}" method="POST" id="commentForm" class="bg-gray-100 p-4 rounded-lg shadow">
                                @csrf
                                <div class="mb-4">
                                    <label for="contenido" class="block text-gray-700">Añadir comentario:</label>
                                    <textarea id="contenido" name="contenido" rows="4" class="w-full mt-2 p-2 border rounded-lg" required></textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Enviar</button>
                                </div>
                            </form>

                            <h3 class="text-2xl font-semibold text-gray-800 leading-tight mb-4">Comentarios</h3>
                            <div id="comments">
                                @foreach ($post->comentarios as $comentario)
                                    <x-comentario :comentario="$comentario" />
                                @endforeach
                            </div>

                            <!-- Formulario para añadir comentarios -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
