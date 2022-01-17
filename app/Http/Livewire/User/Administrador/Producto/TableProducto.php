<?php

namespace App\Http\Livewire\User\Administrador\Producto;

use App\Models\Producto;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;

class TableProducto extends LivewireDatatable
{
    public $sort = 'nombre|asc';

    public function builder()
    {
        return Producto::leftJoin('users', 'users.id', 'productos.user_id');
    }

    public function columns()
    {
        return [
            Column::name('nombre')
                ->label('nombre')
                ->alignCenter()
                ->searchable(),

            Column::callback(['id'], function ($id) {
                return view('user.administrador.producto.table-action', [
                    'id' => $id,
                ]);
            })->unsortable()
                ->excludeFromExport(),
        ];
    }
}
