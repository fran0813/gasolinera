<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Información') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-content class="max-w-7xl">
            <div class="p-4">
                @livewire('user.administrador.informacion.create-informacion')
            </div>
        </x-content>
    </div>
</x-app-layout>
