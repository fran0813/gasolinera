<div>
    <form class="grid gap-2" wire:submit.prevent="save">
        <div>
            <x-jet-label value="{{ __('Empresa') }}" />
            <x-jet-input type="text" class="w-full" placeholder="Empresa" wire:model="informacion.empresa" />
            <x-jet-input-error for="informacion.empresa" />
        </div>

        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
            <div>
                <x-jet-label value="{{ __('Nit') }}" />
                <x-jet-input type="text" class="w-full" placeholder="Nit" onkeypress="return nit(event)"
                    wire:model="informacion.nit" />
                <x-jet-input-error for="informacion.nit" />
            </div>

            <div>
                <x-jet-label value="{{ __('Teléfono') }}" />
                <x-jet-input type="number" class="w-full" placeholder="Telefono"
                    wire:model="informacion.telefono" />
                <x-jet-input-error for="informacion.telefono" />
            </div>
        </div>

        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
            <div>
                <x-jet-label value="{{ __('Dirección') }}" />
                <x-jet-input type="text" class="w-full" placeholder="Dirección"
                    wire:model="informacion.direccion" />
                <x-jet-input-error for="informacion.direccion" />
            </div>

            <div>
                <x-jet-label value="{{ __('Ciudad') }}" />
                <x-jet-input type="text" class="w-full" placeholder="Ciudad" wire:model="informacion.ciudad" />
                <x-jet-input-error for="informacion.ciudad" />
            </div>
        </div>

        <div>
            <x-jet-label value="{{ __('Resolución de la DIAN') }}" />
            <textarea rows="3" class="w-full form-control" wire:model="informacion.dian"></textarea>
            <x-jet-input-error for="informacion.dian" />
        </div>

        <div>
            <x-button-green type="submit" wire:loading.attr="disabled">
                Guardar
            </x-button-green>
        </div>
    </form>

    @push('script')
        <script>
            function nit(e) {
                tecla = (document.all) ? e.keyCode : e.which;

                //Tecla de retroceso para borrar, siempre la permite
                if (tecla == 8) {
                    return true;
                }

                // Patron de entrada, en este caso solo acepta numeros y letras
                patron = /[0-9-]/;
                tecla_final = String.fromCharCode(tecla);
                return patron.test(tecla_final);
            }
        </script>
    @endpush
</div>
