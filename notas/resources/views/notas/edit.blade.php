<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar nota
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('notas.update', $nota) }}" class="max-w-sm mx-auto">
                @method('PUT')
                @csrf
                <label for="nota" class="mt-6 block text-gray-700 font-medium">Nota</label>
                <select id="nota" name="nota" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="" {{ old('nota') == "" ? 'selected' : '' }} disabled>Selecciona un nota</option>
                    @for ($i = 0; $i <= 10; $i++)

                    <option value="{{ $i }}" {{ old('nota', $nota->nota) == $i ? 'selected' : '' }}>{{ $i }}</option>

                    @endfor
                </select>
                <label for="trimestre" class="mt-6 block text-gray-700 font-medium">Trimestre</label>
                <select id="trimestre" name="trimestre" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="" selected disabled>Selecciona un trimestre</option>
                    @for ($i = $nota->asignatura->numero_de_trimestres; $i > 0; $i--)

                    <option value="{{ $i }}" {{ old('trimestre', $nota->trimestre) == $i ? 'selected' : '' }}>{{ $i }}</option>

                    @endfor
                </select>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Editar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
