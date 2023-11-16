<?php

use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\CertificadosController;
use App\Http\Controllers\Api\ContactoController;
use App\Http\Controllers\DownloadCvController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware([
    'auth:sanctum',
    'api'
    ])->group(function () {
        Route::get('/certificados', [PortfolioController::class, 'certificados'])->name('certificados_api');
        Route::get('/cv', [PortfolioController::class, 'cv'])->name('cv_api');
        Route::get('/estudios', [PortfolioController::class, 'estudios'])->name('estudios_api');
        Route::get('/proyectos', [PortfolioController::class, 'proyectos'])->name('proyectos_api');
        Route::get('/testimonios', [PortfolioController::class, 'testimonios'])->name('testimonios_api');
        Route::get('/trabajos', [PortfolioController::class, 'trabajos'])->name('trabajos_api');
        Route::post('/contacto', [ContactoController::class, 'contacto'])->name('contacto_api');
        Route::post('/descargas-cv/{cvId}', [DownloadCvController::class, 'store'])->name('downloads.store');
});
