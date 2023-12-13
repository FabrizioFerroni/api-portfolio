<?php

namespace App\Http\Controllers;

use App\Models\Certificados;
use App\Models\Contacto;
use App\Models\Cv;
use App\Models\DownloadCv;
use App\Models\Estudios;
use App\Models\Proyectos;
use App\Models\Testimonios;
use App\Models\Trabajos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $ccertificados = Certificados::count();
        $cconsultas = Contacto::count();
        $ccv = Cv::count();
        $cdescargas = DownloadCv::count();
        $cestudios = Estudios::count();
        $cproyectos = Proyectos::count();
        $ctestimonios = Testimonios::count();
        $ctrabajos = Trabajos::count();

        return view('dashboard.index', compact('ccertificados', 'cconsultas', 'ccv', 'cdescargas', 'cestudios', 'cproyectos', 'ctestimonios', 'ctrabajos'));
    }
}
