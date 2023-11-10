<?php

namespace App\Http\Controllers;

use App\Http\Requests\CvRequest;
use App\Http\Requests\Update\CvUPDRequest;
use App\Models\Cv;
use Illuminate\Http\Request;
use Str, Storage;

class CvController extends Controller
{
    public function index()
    {
        $cvs = Cv::orderBy('actual', 'desc')->paginate(10);
        return view('cv.index', compact('cvs'));
    }

    public function create()
    {
        return view('cv.create');
    }

    public function store(CvRequest $req)
    {
        $validated = $req->validated();
        if ($validated) {
            $cv = new CV();
            $file = $validated['cv'];
            $filesystem = Storage::disk('public');
            $name = Str::slug($validated['nombre']);

            if ($file) {
                $path = 'cv/' . $name;
                $fileExt = trim($file->getClientOriginalExtension());
                $fileName = rand(1, 9999) . '-' . $name . '.' . $fileExt;

                $cv->folder = $path;
                $cv->cv = $path . '/' . $fileName;
            }

            $cv->nombre = ucfirst(e($validated['nombre']));
            $cv->actual = $validated['actual'];

            if ($validated['actual']) {
                CV::where('id', '!=', $cv->id)->update(['actual' => false]);
            }

            if ($cv->save()) {
                if ($req->hasFile('cv')) {
                    $filesystem->putFileAs($path, $validated['cv'], $fileName);
                }

                return redirect()->route('cv')->with('msgSuccess', 'Cv guardado exitosamente');
            } else {
                return back()->with('msgError', 'Ocurrio un error al guardar el cv');
            }
        }
    }

    public function edit(string $id)
    {
        $cv = Cv::find($id);
        if (!$cv) {
            return redirect()->route('cv')->with('msgError', 'Cv no encontrado');
        }
        return view('cv.edit', compact('cv'));
    }

    public function update(string $id, CvUPDRequest $req)
    {
        $cv = Cv::find($id);
        if (!$cv) {
            return redirect()->route('cv')->with('msgError', 'Cv no encontrado');
        }

        $validated = $req->validated();
        if ($validated) {
            $hasFile = isset($validated['cv']);
            $filesystem = Storage::disk('public');
            $name = Str::slug($validated['nombre']);

            if ($hasFile) {
                $file = $validated['cv'];

                if ($cv->folder != '') {
                    $files = $filesystem->files($cv->folder);

                    if (count($files) === 1) {
                        $filesystem->delete($cv->cv);
                        $filesystem->deleteDirectory($cv->folder);
                    } else {
                        $filesystem->delete($cv->cv);
                    }
                }

                $path = 'cv/' . $name;
                $fileExt = trim($file->getClientOriginalExtension());
                $fileName = rand(1, 9999) . '-' . $name . '.' . $fileExt;

                $cv->folder = $path;
                $cv->cv = $path . '/' . $fileName;
            }

            $cv->nombre = ucfirst(e($validated['nombre']));
            $cv->actual = $validated['actual'];

            if ($validated['actual']) {
                Cv::where('id', '!=', $cv->id)->update(['actual' => false]);
            }

            if ($cv->save()) {
                if ($req->hasFile('cv')) {
                    $filesystem->putFileAs($path, $validated['cv'], $fileName);
                }

                return redirect()->route('cv')->with('msgSuccess', 'Cv actualizado exitosamente');
            } else {
                return back()->with('msgError', 'Ocurrio un error al actualizar el cv');
            }
        }
    }

    public function destroy(string $id)
    {
        $cv = CV::find($id);

        if (!$cv) {
            return redirect()->route('cv')->with('msgError', 'Cv no encontrado');
        }
        $filesystem = Storage::disk('public');

        if ($cv->folder != '') {
            $filesImg = $filesystem->files($cv->folder);

            if (count($filesImg) === 1) {
                $filesystem->delete($cv->cv);
                $filesystem->deleteDirectory($cv->folder);
            } else {
                $filesystem->delete($cv->cv);
            }
        }


        $wasActual = $cv->actual;

        if ($cv->delete()) {
            if ($wasActual) {
                $latestCV = CV::latest()->first();

                if ($latestCV) {
                    $latestCV->actual = true;
                    $latestCV->save();
                }
            }

            return redirect()->route('cv')->with('msgSuccess', 'Cv eliminado exitosamente');
        } else {
            return back()->with('msgError', 'Ocurrio un error al eliminar el cv');
        }
    }
}
