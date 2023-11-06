<?php

use App\Http\Controllers\EstudiosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rutas para autenticación
require_once __DIR__ . '/fortify.php';
require_once __DIR__ . '/jetstream.php';

// Rutas ya logueado
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Estudios route
    Route::get('/estudios',[EstudiosController::class, 'index'])->name('estudios');
    Route::get('/estudios/agregar',[EstudiosController::class, 'create'])->name('estudios.create');
    Route::post('/estudios/agregar',[EstudiosController::class, 'store'])->name('estudios.store');
    Route::get('/estudios/{id}/editar',[EstudiosController::class, 'edit'])->name('estudios.edit');
    Route::post('/estudios/{id}/editar',[EstudiosController::class, 'update'])->name('estudios.update');
    Route::post('/estudios/{id}/eliminar',[EstudiosController::class, 'destroy'])->name('estudios.destroy');



    Route::get('/usuarios', function () {
        return view('dashboard');
    })->name('usuarios');
});
