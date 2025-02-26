<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Imágenes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('evento-tabla') <!-- Aquí insertas el componente Livewire -->
        </div>
    </div>

        {{-- <div class="mt-2">
            {{ $eventos->links() }}
        </div> --}}
</x-app-layout>
