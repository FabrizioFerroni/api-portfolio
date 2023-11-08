<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificadoRequest;
use App\Http\Requests\Update\CertificadoUPRequest;
use App\Models\Certificados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class CertificadosController extends Controller
{
    public function index(){
        $certificados = Certificados::orderBy('created_at', 'desc')->paginate(10);

        return view('certificates.index', compact('certificados'));
    }

    public function index_api()
    {
        $certificados = Certificados::orderBy('created_at', 'desc')->get();
        foreach ($certificados as $certificado) {
            $certificado->imagen = asset($certificado->imagen);
            $certificado->certificado = asset($certificado->certificado);
        }
        return response()->json(['certificates' => $certificados], 200);
    }

    public function create(){
        return view('certificates.create');
    }

    public function store(CertificadoRequest $req){
        $validated = $req->validated();
        if($validated){
            $certificado = new Certificados();

            $fileImg = $validated['imagen'];
            $fileCert = $validated['certificado'];

            if ($fileImg) {
                $name = Str::slug($validated['titulo']);
                $pathImg = 'certificados/img/' . $name;
                $fileExt = trim($fileImg->getClientOriginalExtension());
                $fileNameImg = rand(1, 9999) . '-' . $name . '.' . $fileExt;

                $certificado->folder = $pathImg;
                $certificado->imagen = $pathImg . '/' . $fileNameImg;
            }

            if ($fileCert) {
                $name = Str::slug($validated['titulo']);
                $pathCert = 'certificados/pdf/' . $name;
                $fileExt = trim($fileCert->getClientOriginalExtension());
                $fileNameCert = rand(1, 9999) . '-' . $name . '.' . $fileExt;

                $certificado->folder_certificado = $pathCert;
                $certificado->certificado = $pathCert . '/' . $fileNameCert;
            }

            $certificado->titulo = ucfirst(e($validated['titulo']));
            $certificado->academia = ucfirst(e($validated['academia']));
            $certificado->rango_fecha = ucfirst($validated['rango_fecha']);
            $certificado->tags = json_decode($validated['tags']);

            if ($certificado->save()) {
                if ($req->hasFile('imagen') && $req->hasFile('certificado')) {
                    $filesystem = Storage::disk('public');
                    $filesystem->putFileAs($pathImg, $validated['imagen'], $fileNameImg);
                    $filesystem->putFileAs($pathCert, $validated['certificado'], $fileNameCert);
                }
                return redirect()->route('certificados')->with('msgSuccess', 'Certificado creado exitosamente');
            } else {
                return back()->with('msgError', 'Ocurrio un error al crear el certificado');
            }
        }
    }

    public function edit(string $id)  {
        $certificado = Certificados::find($id);

        if(!$certificado){
            return redirect('/certificados')->with('msgError', 'Ocurrio un error, no se ha encontrado un certificado con ese ID');
        }

        return view('certificates.edit', compact('certificado'));
    }

    public function update(string $id, CertificadoUPRequest $req){
        $certificado = Certificados::find($id);

        if(!$certificado){
            return redirect('/certificados')->with('msgError', 'Ocurrio un error, no se ha encontrado un certificado con ese ID');
        }

        $validated = $req->validated();

        if($validated){
            $hasImgFile = isset($validated['imagen']);
            $hasPdfFile = isset($validated['certificado']);
            $name = Str::slug($validated['titulo']);
            $filesystem = Storage::disk('public');

            if($hasImgFile){
                $fileImg = $validated['imagen'];
                if($certificado->folder != ''){
                    $files = $filesystem->files($certificado->folder);

                    if (count($files) === 1) {
                        $filesystem->delete($certificado->imagen);
                        $filesystem->deleteDirectory($certificado->folder);
                    } else {
                        $filesystem->delete($certificado->imagen);
                    }
                }

                $pathImg = 'certificados/img/' . $name;
                $fileExt = trim($fileImg->getClientOriginalExtension());
                $fileNameImg = rand(1, 9999) . '-' . $name . '.' . $fileExt;

                $certificado->folder = $pathImg;
                $certificado->imagen = $pathImg . '/' . $fileNameImg;
            }

            if($hasPdfFile){
                $filePdf = $validated['certificado'];
                if($certificado->folder != ''){
                    $files = $filesystem->files($certificado->folder_certificado);

                    if (count($files) === 1) {
                        $filesystem->delete($certificado->certificado);
                        $filesystem->deleteDirectory($certificado->folder_certificado);
                    } else {
                        $filesystem->delete($certificado->certificado);
                    }
                }

                $pathPdf = 'certificados/pdf/' . $name;
                $fileExt = trim($filePdf->getClientOriginalExtension());
                $fileNamePdf = rand(1, 9999) . '-' . $name . '.' . $fileExt;

                $certificado->folder_ = $pathPdf;
                $certificado->certificado = $pathPdf . '/' . $fileNamePdf;
            }

            $certificado->titulo = ucfirst(e($validated['titulo']));
            $certificado->academia = ucfirst(e($validated['academia']));
            $certificado->rango_fecha = ucfirst($validated['rango_fecha']);
            $certificado->tags = json_decode($validated['tags']);

            if($certificado->save()){
                if($hasImgFile && $hasPdfFile){
                    $filesystem->putFileAs($pathImg, $validated['imagen'], $fileNameImg);
                    $filesystem->putFileAs($pathPdf, $validated['certificado'], $fileNamePdf);
                }
                return redirect()->route('certificados')->with('msgSuccess', 'Certificado actualizado exitosamente');
            } else {
                return back()->with('msgError', 'Ocurrio un error al actualizar el certificado');
            }
        }
    }

    public function destroy(string $id)
    {
        $certificado = Certificados::find($id);

        if (!$certificado) {
            return back()->with('msgError', 'Certificado no encontrado');
        }

        $filesystem = Storage::disk('public');

        if ($certificado->folder != '') {
            $filesImg = $filesystem->files($certificado->folder);

            if (count($filesImg) === 1) {
                $filesystem->delete($certificado->imagen);
                $filesystem->deleteDirectory($certificado->folder);
            } else {
                $filesystem->delete($certificado->imagen);
            }
        }

        if ($certificado->folder_certificado != '') {
            $filesPdf = $filesystem->files($certificado->folder_certificado);

            if (count($filesPdf) === 1) {
                $filesystem->delete($certificado->certificado);
                $filesystem->deleteDirectory($certificado->folder_certificado);
            } else {
                $filesystem->delete($certificado->certificado);
            }
        }

        if ($certificado->delete()) {
            return back()->with('msgSuccess', 'Certificado eliminado exitosamente');
        } else {
            return back()->with('msgError', 'Ocurrio un error al eliminar el certificado');
        }
    }
}
