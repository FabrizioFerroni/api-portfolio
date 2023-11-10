<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificados;
use App\Models\Cv;
use App\Models\Estudios;
use App\Models\Proyectos;
use App\Models\Testimonios;
use App\Models\Trabajos;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function certificados()
    {
        $certificados = Certificados::orderBy('created_at', 'desc')->get();
        foreach ($certificados as $certificado) {
            $certificado->imagen = asset($certificado->imagen);
            $certificado->certificado = asset($certificado->certificado);
        }
        return response()->json(['certificados' => $certificados], 200);
    }

    public function cv()
    {
        $cv = Cv::where('actual', true)->orderBy('actual', 'desc')->first();
        $cv->cv = asset($cv->cv);
        return response()->json($cv, 200);
    }

    public function estudios()
    {
        $estudios = Estudios::orderBy('actual', 'desc')->orderBy('created_at', 'desc')->get();
        return response()->json(['estudios'=>$estudios], 200);
    }

    public function proyectos()
    {
        $proyectos = Proyectos::orderBy('created_at', 'desc')->get();
        foreach ($proyectos as $proyecto) {
            $proyecto->imagen = asset($proyecto->imagen);
        }

        return response()->json(['proyectos'=>$proyectos], 200);
    }

    public function testimonios()
    {
        $testimonios = Testimonios::orderBy('created_at', 'desc')->get();

        foreach ($testimonios as $testimonio) {
            $testimonio->imagen = asset($testimonio->imagen);
        }

        return response()->json(['testimonios'=>$testimonios], 200);
    }

    public function trabajos()
    {
        $trabajos = Trabajos::orderBy('actual', 'desc')->orderBy('created_at', 'desc')->get();

        return response()->json(['trabajos'=>$trabajos], 200);

    }
}
