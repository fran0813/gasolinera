<?php

namespace App\Http\Livewire\User\Vendedor;

use App\Exports\VentasExport;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class CreateVenta extends Component
{
    public $table_producto = [];
    public $valor, $producto, $select_producto;
    public $total = 0;

    protected $listeners = [
        'updateTotal',
    ];

    protected $rules = [
        'producto' => 'required',
        'valor' => 'required|numeric',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->select_producto = Producto::all();
    }

    public function add()
    {
        $this->validate();

        $this->table_producto[] = [
            'producto_id' => $this->producto,
            'producto' => Producto::where('id', $this->producto)->first()->nombre,
            'valor' => $this->valor,
        ];

        $this->reset([
            'producto',
            'valor',
        ]);

        $this->emitSelf('updateTotal');
    }

    public function remove($index)
    {
        unset($this->table_producto[$index]);
        $this->table_producto = array_values($this->table_producto);

        $this->emitSelf('updateTotal');
    }

    public function updateTotal()
    {
        $this->reset([
            'total',
        ]);

        foreach ($this->table_producto as $table_producto) {
            $this->total += $table_producto['valor'];
        }
    }

    public function save()
    {
        if (!empty($this->table_producto)) {
            $venta = Venta::create([
                'user_id' => Auth::id(),
            ]);

            foreach ($this->table_producto as $table_producto) {
                $venta->productos()->attach($table_producto['producto_id'], [
                    'valor' => $table_producto['valor'],
                ]);
            }

            $this->reset([
                'producto',
                'valor',
                'table_producto',
            ]);

            $this->emitTo('user.vendedor.table-venta', 'refreshLivewireDatatable');
            $this->emit('alert_success', [
                'message' => 'Guardado con éxito',
            ]);

            return Excel::download(new VentasExport($venta->id), 'recibo-'.$venta->id.'.xlsx');
        } else {
            $this->emit('alert_error', [
                'message' => 'Por favor agregue un producto',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user.vendedor.create-venta');
    }
}
