<?php

namespace App\Http\Livewire\User\Administrador\Producto;

use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateProducto extends Component
{
    public $nombre;

    protected $rules = [
        'nombre' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        Producto::create([
            'nombre' => $this->nombre,
            'user_id' => Auth::id(),
        ]);

        $this->reset([
            'nombre',
        ]);

        $this->emitTo('user.administrador.producto.table-producto', 'refreshLivewireDatatable');
        $this->emit('alert_success', [
            'message' => 'Guardado con éxito',
        ]);
    }

    public function render()
    {
        return view('livewire.user.administrador.producto.create-producto');
    }
}
