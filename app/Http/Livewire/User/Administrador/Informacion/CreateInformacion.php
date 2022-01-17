<?php

namespace App\Http\Livewire\User\Administrador\Informacion;

use App\Models\Informacion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateInformacion extends Component
{
    public $informacion;

    protected $rules = [
        'informacion.empresa' => 'required',
        'informacion.nit' => 'required',
        'informacion.telefono' => 'required|numeric',
        'informacion.direccion' => 'required',
        'informacion.ciudad' => 'required',
        'informacion.dian' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->informacion = Informacion::first();
    }

    public function save()
    {
        $this->validate();

        Informacion::updateOrCreate([
            'id' => 1,
        ],
        [
            'empresa' => $this->informacion['empresa'],
            'nit' => $this->informacion['nit'],
            'telefono' => $this->informacion['telefono'],
            'direccion' => $this->informacion['direccion'],
            'ciudad' => $this->informacion['ciudad'],
            'dian' => $this->informacion['dian'],
            'user_id' => Auth::id(),
        ]);

        $this->emit('alert_success', [
            'message' => 'Guardado con éxito',
        ]);
    }

    public function render()
    {
        return view('livewire.user.administrador.informacion.create-informacion');
    }
}
