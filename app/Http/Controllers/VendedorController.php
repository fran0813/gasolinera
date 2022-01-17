<?php

namespace App\Http\Controllers;

use App\Exports\VentasExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VendedorController extends Controller
{
    public function index()
    {
        return view('user.vendedor.index');
    }

    // Excel
    public function ventaExport($id)
    {
        return Excel::download(new VentasExport($id), 'recibo-'.$id.'.xlsx');
    }
}
