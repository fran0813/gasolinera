<div>
    <div class="grid gap-2">
        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
            <div>
                <x-jet-label value="Producto" />
                <select class="w-full form-control" wire:model="producto">
                    <option value="" selected>Seleccione</option>
                    @foreach ($select_producto as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="producto" />
            </div>

            <div>
                <x-jet-label value="{{ __('Valor') }}" />
                <x-jet-input type="number" class="w-full" placeholder="Valor" min="50" wire:model="valor" />
                <x-jet-input-error for="valor" />
            </div>
        </div>

        <div>
            <div class="flex justify-start gap-2">
                <x-button-blue type="button" wire:click="add" wire:loading.attr="disabled">
                    Agregar
                </x-button-blue>

                <x-button-green type="button" wire:click="save" wire:loading.attr="disabled">
                    Guardar
                </x-button-green>
            </div>

            <div class="flex justify-end">
                <p>Valor total: <strong>${{ number_format($total) }}</strong></p>
            </div>
        </div>

        <div>
            <table class="w-full border-separate" id="platillo_table">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-center border">Producto</th>
                        <th class="px-4 py-2 text-center border">Valor</th>
                        <th class="px-4 py-2 text-center border">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table_producto as $index => $item)
                        <tr>
                            <td class="px-4 py-2 text-center border">
                                <x-jet-input type="text" class="w-full" disabled
                                    wire:model="table_producto.{{ $index }}.producto" />
                            </td>
                            <td class="px-4 py-2 text-center border">
                                <x-jet-input type="number" class="w-full" disabled
                                    wire:model="table_producto.{{ $index }}.valor" />
                            </td>
                            <td class="flex justify-center px-4 py-2 border">
                                <a wire:click="remove({{ $index }})" class="btn btn-red">
                                    <i class="fa-trash fas"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
