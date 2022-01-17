<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Venta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-content class="mb-4 max-w-7xl">
            <div class="p-4">
                @livewire('user.vendedor.create-venta')
            </div>
        </x-content>

        <x-content class="max-w-7xl">
            <div class="p-4">
                <h1 class="mb-2 text-2xl text-center">Facturas</h1>
                @livewire('user.vendedor.table-venta')
            </div>
        </x-content>
    </div>
</x-app-layout>
