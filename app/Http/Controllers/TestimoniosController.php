<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonioRequest;
use App\Http\Requests\Update\TestimonioUpdateRequest;
use App\Models\Testimonios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str, Config;

class TestimoniosController extends Controller
{
    public function index()
    {
        $testimonios = Testimonios::orderBy('created_at', 'desc')->paginate(10);
        return view('testimonios.index', compact('testimonios'));
    }

    public function create()
    {
        return view('testimonios.create');
    }

    public function store(TestimonioRequest $req)
    {
        $validated = $req->validated();
        if ($validated) {
            $testimonio = new Testimonios();

            $file = $validated['imagen'];

            if ($file) {
                $name = Str::slug($validated['cliente']);
                $path = 'testimonios/' . $name;
                $fileExt = trim($file->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $fileName = rand(1, 9999) . '-' . $name . '.' . $fileExt;

                $testimonio->folder = $path;
                $testimonio->imagen = $path . '/' . $fileName;
            }

            $testimonio->cliente = e($validated['cliente']);
            $testimonio->cargo = e($validated['cargo']);
            $testimonio->descripcion = $validated['descripcion'];

            if ($testimonio->save()) {
                if ($req->hasFile('imagen')) {
                    $filesystem = Storage::disk('public');
                    $filesystem->putFileAs($path, $validated['imagen'], $fileName);
                }
                return redirect()->route('testimonios')->with('msgSuccess', 'Testimonio creado exitosamente');
            } else {
                return back()->with('msgError', 'Ocurrio un error al crear el testimonio');
            }
        }
    }

    public function edit(string $id)
    {
        $testimonio = Testimonios::find($id);

        if (!$testimonio) {
            return redirect('/testimonios')->with('msgError', 'Ocurrio un error, no se ha encontrado un testimonio con ese ID');
        }

        return view('testimonios.edit', compact('testimonio'));
    }

    public function update(TestimonioUpdateRequest $req, string $id)
    {
        $testimonio = Testimonios::find($id);

        if (!$testimonio) {
            return redirect('/testimonios')->with('msgError', 'Ocurrio un error, no se ha encontrado un testimonio con ese ID');
        }

        $validated = $req->validated();
        if ($validated) {
            $hasFile = isset($validated['imagen']);
            if ($hasFile) {
                $file = $validated['imagen'];
                if ($testimonio->folder != '') {
                    $filesystem = Storage::disk('public');

                    // Obtiene la lista de archivos en la carpeta
                    $files = $filesystem->files($testimonio->folder);

                    // Verifica si la carpeta está vacía
                    if (count($files) === 1) {
                        // Borra el archivo
                        $filesystem->delete($testimonio->imagen);

                        // Borra la carpeta
                        $filesystem->deleteDirectory($testimonio->folder);
                    } else {
                        // Si hay más de un archivo, solo elimina el archivo específico
                        $filesystem->delete($testimonio->imagen);
                    }
                }

                $name = Str::slug($validated['cliente']);
                $path = 'testimonios/' . $name;
                $fileExt = trim($file->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $fileName = rand(1, 9999) . '-' . $name . '.' . $fileExt;
                $testimonio->folder = $path;
                $testimonio->imagen = $path . '/' . $fileName;
            }

            $testimonio->cliente = e($validated['cliente']);
            $testimonio->cargo = e($validated['cargo']);
            $testimonio->descripcion = $validated['descripcion'];

            if ($testimonio->save()) {
                if ($req->hasFile('imagen')) {
                    $filesystem = Storage::disk('public');
                    $filesystem->putFileAs($path, $validated['imagen'], $fileName);
                }
                return redirect()->route('testimonios')->with('msgSuccess', 'Testimonio actualizado exitosamente');
            } else {
                return back()->with('msgError', 'Ocurrio un error al actualizar el testimonio');
            }
        }
    }

    public function destroy(string $id)
    {
        $testimonio = Testimonios::find($id);

        if (!$testimonio) {
            return back()->with('msgError', 'Testimonio no encontrado');
        }

        if ($testimonio->folder != '') {
            $filesystem = Storage::disk('public');

            // Obtiene la lista de archivos en la carpeta
            $files = $filesystem->files($testimonio->folder);

            // Verifica si la carpeta está vacía
            if (count($files) === 1) {
                // Borra el archivo
                $filesystem->delete($testimonio->imagen);

                // Borra la carpeta
                $filesystem->deleteDirectory($testimonio->folder);
            } else {
                // Si hay más de un archivo, solo elimina el archivo específico
                $filesystem->delete($testimonio->imagen);
            }
        }

        if ($testimonio->delete()) {
            return back()->with('msgSuccess', 'Testimonio eliminado exitosamente');
        } else {
            return back()->with('msgError', 'Ocurrio un error al eliminar el testimonio');
        }
    }
}
