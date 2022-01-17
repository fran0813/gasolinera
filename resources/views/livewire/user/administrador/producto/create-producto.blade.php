<div>
    <form class="grid gap-2" wire:submit.prevent="save">
        <div>
            <x-jet-label value="{{ __('Nombre') }}" />
            <x-jet-input type="text" class="w-full" placeholder="Nombre" wire:model="nombre" />
            <x-jet-input-error for="nombre" />
        </div>

        <div>
            <x-button-green type="submit" wire:loading.attr="disabled">
                Guardar
            </x-button-green>
        </div>
    </form>
</div>
