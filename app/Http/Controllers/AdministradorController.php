<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        return view('user.administrador.producto.index');
    }

    public function informacion()
    {
        return view('user.administrador.informacion.index');
    }
}
