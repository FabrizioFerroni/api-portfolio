<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoRequest;
use App\Http\Requests\Update\ProyectoUPRequest;
use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class ProyectosController extends Controller
{
    public function index()
    {
        $proyectos = Proyectos::orderBy('created_at', 'desc')->paginate(10);
        return view('projects.index', compact('proyectos'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(ProyectoRequest $req)
    {
        $validated = $req->validated();
        if ($validated) {
            $proyecto = new Proyectos();
            $file = $validated['imagen'];
            $filesystem = Storage::disk('public');
            $name = Str::slug($validated['titulo']);

            if ($file) {
                $path = 'proyectos/' . $name;
                $fileExt = trim($file->getClientOriginalExtension());
                $fileName = rand(1, 9999) . '-' . $name . '.' . $fileExt;

                $proyecto->folder = $path;
                $proyecto->imagen = $path . '/' . $fileName;
            }

            $proyecto->titulo = ucfirst(e($validated['titulo']));
            $proyecto->descripcion = $validated['descripcion'];
            $proyecto->url_proyecto = strtolower(e($validated['url_proyecto']));
            $proyecto->url_github = strtolower(e($validated['url_github']));
            $proyecto->is_online = $validated['is_online'];
            $proyecto->is_private = $validated['is_private'];
            $proyecto->categoria = $validated['categoria'];
            $proyecto->tags = json_decode($validated['tags']);


            if ($proyecto->save()) {
                if ($req->hasFile('imagen')) {
                    $filesystem->putFileAs($path, $validated['imagen'], $fileName);
                }
                return redirect()->route('proyectos')->with('msgSuccess', 'Proyecto creado exitosamente');
            } else {
                return back()->with('msgError', 'Ocurrio un error al crear el proyecto');
            }
        }
    }

    public function edit(string $id)
    {
        $proyecto = Proyectos::find($id);

        if (!$proyecto) {
            return redirect()->route('proyectos')->with('msgError', 'Proyecto no encontrado');
        }

        return view('projects.edit', compact('proyecto'));
    }

    public function update(ProyectoUPRequest $req, string $id)
    {
        $proyecto = Proyectos::find($id);

        if (!$proyecto) {
            return redirect()->route('proyectos')->with('msgError', 'Proyecto no encontrado');
        }

        $validated = $req->validated();
        if ($validated) {
            $hasFile = isset($validated['imagen']);
            $filesystem = Storage::disk('public');
            $name = Str::slug($validated['titulo']);

            if ($hasFile) {
                $file = $validated['imagen'];

                if($proyecto->folder != ''){
                    $files = $filesystem->files($proyecto->folder);

                    if (count($files) === 1) {
                        $filesystem->delete($proyecto->imagen);
                        $filesystem->deleteDirectory($proyecto->folder);
                    } else {
                        $filesystem->delete($proyecto->imagen);
                    }
                }

                $path = 'proyectos/' . $name;
                $fileExt = trim($file->getClientOriginalExtension());
                $fileName = rand(1, 9999) . '-' . $name . '.' . $fileExt;

                $proyecto->folder = $path;
                $proyecto->imagen = $path . '/' . $fileName;
            }

            $proyecto->titulo = ucfirst(e($validated['titulo']));
            $proyecto->descripcion = $validated['descripcion'];
            $proyecto->url_proyecto = strtolower(e($validated['url_proyecto']));
            $proyecto->url_github = strtolower(e($validated['url_github']));
            $proyecto->is_online = $validated['is_online'];
            $proyecto->is_private = $validated['is_private'];
            $proyecto->categoria = $validated['categoria'];
            $proyecto->tags = json_decode($validated['tags']);


            if($proyecto->save()){
                if ($hasFile) {
                    $filesystem->putFileAs($path, $validated['imagen'], $fileName);
                }
                return redirect()->route('proyectos')->with('msgSuccess', 'Proyecto actualizado exitosamente');
            }else{
                return back()->with('msgError', 'Ocurrio un error al actualizar el proyecto');
            }
        }

    }

    public function destroy(string $id)
    {

        $proyecto = Proyectos::find($id);

        if (!$proyecto) {
            return back()->with('msgError', 'Proyecto no encontrado');
        }

        $filesystem = Storage::disk('public');

        if ($proyecto->folder != '') {
            $filesImg = $filesystem->files($proyecto->folder);

            if (count($filesImg) === 1) {
                $filesystem->delete($proyecto->imagen);
                $filesystem->deleteDirectory($proyecto->folder);
            } else {
                $filesystem->delete($proyecto->imagen);
            }
        }

        if ($proyecto->delete()) {
            return back()->with('msgSuccess', 'Proyecto eliminado exitosamente');
        } else {
            return back()->with('msgError', 'Ocurrio un error al eliminar el proyecto');
        }
    }
}
