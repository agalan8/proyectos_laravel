<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Imágenes') }}
        </h2>
    </x-slot>
    @livewire('evento-index')
        {{-- <div class="mt-2">
            {{ $eventos->links() }}
        </div> --}}
</x-app-layout>
