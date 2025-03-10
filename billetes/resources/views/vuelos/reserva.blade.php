<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear reserva
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('reservas.store') }}" class="max-w-sm mx-auto">
                @csrf
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione un asiento</label>

                <select id="countries" name="asiento_id" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Elige un asiento:</option>
                @foreach ($vuelo->asientos as $asiento)
                    @if(!$asiento->reserva)
                    <option value="{{ $asiento->id }}">{{ $asiento->numero }}</option>
                    @endif
                @endforeach
                </select>

                <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Crear
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
