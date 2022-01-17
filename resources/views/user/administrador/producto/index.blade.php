<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-content class="mb-4 max-w-7xl">
            <div class="p-4">
                @livewire('user.administrador.producto.create-producto')
            </div>
        </x-content>

        <x-content class="max-w-7xl">
            <div class="p-4">
                @livewire('user.administrador.producto.table-producto')
            </div>
        </x-content>
    </div>

    @livewire('user.administrador.producto.edit-producto')
</x-app-layout>
