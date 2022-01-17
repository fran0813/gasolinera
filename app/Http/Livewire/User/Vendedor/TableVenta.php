<?php

namespace App\Http\Livewire\User\Vendedor;

use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TableVenta extends LivewireDatatable
{
    public $sort = 'created_at|desc';

    public function builder()
    {
        return Venta::leftJoin('users', 'users.id', 'ventas.user_id')
            ->where('ventas.user_id', Auth::id());
    }

    public function columns()
    {
        return [
            Column::raw('DATE_FORMAT(ventas.created_at, "%d-%m-%Y %h:%i %p")')
                ->label('fecha')
                ->alignCenter()
                ->searchable(),

            Column::callback(['id'], function ($id) {
                return view('user.vendedor.table-action', [
                    'id' => $id,
                ]);
            })->unsortable()
                ->excludeFromExport(),
        ];
    }
}
