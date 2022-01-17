<div>
    <x-jet-dialog-modal wire:model="modal" maxWidth="4xl">
        <x-slot name="title">
            Editar producto
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label value="{{ __('Nombre') }}" />
                <x-jet-input type="text" class="w-full" placeholder="Nombre" wire:model="producto.nombre" />
                <x-jet-input-error for="producto.nombre" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('modal', false)" class="mb-2">
                Cerrar
            </x-jet-danger-button>

            <x-button-blue wire:click="update" wire:loading.attr="disabled">
                Actualizar
            </x-button-blue>
        </x-slot>
    </x-jet-dialog-modal>
</div>
