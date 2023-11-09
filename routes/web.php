<?php

use App\Http\Controllers\CertificadosController;
use App\Http\Controllers\EstudiosController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\TestimoniosController;
use App\Http\Controllers\TrabajosController;
use App\Http\Controllers\UsuariosController;
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

    // Certificados route
    Route::get('/certificados', [CertificadosController::class, 'index'])->name('certificados');
    Route::get('/certificados/subir', [CertificadosController::class, 'create'])->name('certificados.create');
    Route::post('/certificados/subir', [CertificadosController::class, 'store'])->name('certificados.store');
    Route::get('/certificados/{id}/editar', [CertificadosController::class, 'edit'])->name('certificados.edit');
    Route::post('/certificados/{id}/editar', [CertificadosController::class, 'update'])->name('certificados.update');
    Route::post('/certificados/{id}/eliminar', [CertificadosController::class, 'destroy'])->name('certificados.destroy');

    // Estudios route
    Route::get('/estudios',[EstudiosController::class, 'index'])->name('estudios');
    Route::get('/estudios/agregar',[EstudiosController::class, 'create'])->name('estudios.create');
    Route::post('/estudios/agregar',[EstudiosController::class, 'store'])->name('estudios.store');
    Route::get('/estudios/{id}/editar',[EstudiosController::class, 'edit'])->name('estudios.edit');
    Route::post('/estudios/{id}/editar',[EstudiosController::class, 'update'])->name('estudios.update');
    Route::post('/estudios/{id}/eliminar',[EstudiosController::class, 'destroy'])->name('estudios.destroy');

    // Proyectos route
    Route::get('/proyectos', [ProyectosController::class, 'index'])->name('proyectos');
    Route::get('/proyectos/agregar', [ProyectosController::class, 'create'])->name('proyectos.create');
    Route::post('/proyectos/agregar', [ProyectosController::class, 'store'])->name('proyectos.store');
    Route::get('/proyectos/{id}/editar', [ProyectosController::class, 'edit'])->name('proyectos.edit');
    Route::post('/proyectos/{id}/editar', [ProyectosController::class, 'update'])->name('proyectos.update');
    Route::post('/proyectos/{id}/eliminar', [ProyectosController::class, 'destroy'])->name('proyectos.destroy');

    // Testimonios route
    Route::get('/testimonios', [TestimoniosController::class, 'index'])->name('testimonios');
    Route::get('/testimonios/agregar', [TestimoniosController::class, 'create'])->name('testimonios.create');
    Route::post('/testimonios/agregar', [TestimoniosController::class, 'store'])->name('testimonios.store');
    Route::get('/testimonios/{id}/editar', [TestimoniosController::class, 'edit'])->name('testimonios.edit');
    Route::post('/testimonios/{id}/editar', [TestimoniosController::class, 'update'])->name('testimonios.update');
    Route::post('/testimonios/{id}/eliminar', [TestimoniosController::class, 'destroy'])->name('testimonios.destroy');

    // Trabajos route
    Route::get('/trabajos', [TrabajosController::class,  'index'])->name('trabajos');
    Route::get('/trabajos/agregar',[TrabajosController::class, 'create'])->name('trabajos.create');
    Route::post('/trabajos/agregar',[TrabajosController::class, 'store'])->name('trabajos.store');
    Route::get('/trabajos/{id}/editar',[TrabajosController::class, 'edit'])->name('trabajos.edit');
    Route::post('/trabajos/{id}/editar',[TrabajosController::class, 'update'])->name('trabajos.update');
    Route::post('/trabajos/{id}/eliminar',[TrabajosController::class, 'destroy'])->name('trabajos.destroy');

    // Usuarios route
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
    Route::get('/usuarios/agregar', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/agregar', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}/editar',[UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::post('/usuarios/{id}/editar',[UsuariosController::class, 'update'])->name('usuarios.update');
    Route::post('/usuarios/{id}/eliminar',[UsuariosController::class, 'destroy'])->name('usuarios.destroy');
});

// Rutas sin autenticación para imagenes
require_once __DIR__ . '/images.php';
