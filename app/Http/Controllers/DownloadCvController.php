<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\DownloadCv;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DownloadCvController extends Controller
{
    public function index()
    {
        $downloads = DownloadCv::orderBy('last_download_date', 'desc')->paginate(10);

        foreach ($downloads as $download) {
            $download->last_download_date = Carbon::parse($download->last_download_date)->format('d/m/Y H:i');
        }

        return view('downloads.index', compact('downloads'));
    }

    public function store(Request $req, string $cvId)
    {
        $cv = Cv::find($cvId);

        if(!$cv) {
            return response()->json(['mensaje' => 'Cv no encontrado'], 404);
        }

        if(!$cv->actual) {
            return response()->json(['mensaje' => 'Este no es el curriculum vitae actual'], 400);
        }

        $ip = request()->getClientIp();

        $download = DownloadCv::where('cv_id', $cvId)
            ->where('ip_address', $ip)
            ->first();

        if ($download) {
            $download->count += 1;
            $download->last_download_date = Carbon::now();
            $download->save();
        } else {
            $download = new DownloadCv();
            $download->cv_id = $cvId;
            $download->ip_address = $ip;
            $download->count += 1;
            $download->last_download_date = Carbon::now();
            $download->save();
        }

        return response()->json(['message' => 'Gracias por descargar mi curriculum'], 200);
    }
}
