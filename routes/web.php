<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\VendedorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function() {
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    return 'DONE';
});

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::user()->role_id == 1) {
        return redirect('/admin');
    } else if (Auth::user()->role_id == 2) {
        return redirect('/vendedor');
    } else if (Auth::user()->role_id == 3) {
        return redirect('/administrador');
    }
})->name('dashboard');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group([
    'prefix' => 'administrador',
    'middleware' => ['auth', 'checkAdministrador'],
], function () {

    // View
    Route::get('/', [AdministradorController::class, 'index'])->name('administrador.index');
    Route::get('/informacion', [AdministradorController::class, 'informacion'])->name('administrador.informacion');
});

Route::group([
    'prefix' => 'vendedor',
    'middleware' => ['auth', 'checkVendedor'],
], function () {

    // View
    Route::get('/', [VendedorController::class, 'index'])->name('vendedor.index');

    // Excel
    Route::get('/ventaExport/{id}', [VendedorController::class, 'ventaExport'])->name('vendedor.ventaExport');
});
