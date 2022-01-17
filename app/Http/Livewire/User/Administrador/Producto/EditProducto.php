<?php

namespace App\Http\Livewire\User\Administrador\Producto;

use App\Models\Producto;
use Livewire\Component;

class EditProducto extends Component
{
    public $modal = false;
    public $producto;

    protected $listeners = [
        'open',
    ];

    protected $rules = [
        'producto.nombre' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function open($producto_id)
    {
        $this->modal = true;
        $this->producto = Producto::find($producto_id);
    }

    public function update()
    {
        $this->validate();

        $this->producto->save();

        $this->reset([
            'modal',
        ]);

        $this->emitTo('user.administrador.producto.table-producto', 'refreshLivewireDatatable');
        $this->emit('alert_success', [
            'message' => 'Actualizado con éxito',
        ]);
    }

    public function render()
    {
        return view('livewire.user.administrador.producto.edit-producto');
    }
}
