<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrabajoRequest;
use App\Models\Trabajos;
use Illuminate\Http\Request;

class TrabajosController extends Controller
{

    public function index(){
        $trabajos = Trabajos::orderBy('created_at', 'desc')->paginate(10);
        return view('works.index', compact('trabajos'));
    }

    public function create()
    {
        return view('works.create');
    }

    public function store(TrabajoRequest $req)
    {
        $validated = $req->validated();

        if($validated){
            $trabajo = new Trabajos();
            $trabajo->title = e($validated['title']);
            $trabajo->empresa = e($validated['empresa']);
            $trabajo->descripcion = $validated['descripcion'];
            $trabajo->duracion = e($validated['duracion']);
            $trabajo->fecha_desde_hasta = e($validated['fecha_desde_hasta']);
            $trabajo->actual = $validated['actual'];

            if($trabajo->save()){
                return redirect('/trabajos')->with('msgSuccess', 'Trabajo agregado exitosamente');
            } else {
                return back()->with('msgError', 'Ocurrio un error al agregar el trabajo');
            }
        }

    }

    public function edit(string $id)
    {
        $trabajo = Trabajos::find($id);

        if(!$trabajo){
            return redirect('/trabajos')->with('msgError', 'Ocurrio un error, no se ha encontrado un trabajo con ese ID');
        }

        return view('works.edit', compact('trabajo'));
    }

    public function update(string $id, TrabajoRequest $req)
    {
        $trabajo = Trabajos::find($id);

        if($trabajo){
            $validated = $req->validated();

            if($validated){
                $trabajo->title = e($validated['title']);
                $trabajo->empresa = e($validated['empresa']);
                $trabajo->descripcion = $validated['descripcion'];
                $trabajo->duracion = e($validated['duracion']);
                $trabajo->fecha_desde_hasta = e($validated['fecha_desde_hasta']);
                $trabajo->actual = $validated['actual'];

                if($trabajo->save()){
                    return redirect('/trabajos')->with('msgSuccess', 'Trabajo actualizado exitosamente');
                } else {
                    return back()->with('msgError', 'Ocurrio un error al actualizar el trabajo');
                }
            }
        } else {
            return back()->with('msgError', 'Ocurrio un error, no se ha encontrado un trabajo con ese ID');
        }
    }

    public function destroy(string $id)
    {
        $trabajo = Trabajos::find($id);

        if(!$trabajo){
            return redirect('/trabajos')->with('msgError', 'Ocurrio un error, no se ha encontrado un trabajo con ese ID');
        }

        if($trabajo->delete()){
            return redirect('/trabajos')->with('msgSuccess', 'Trabajo eliminado exitosamente');
        } else {
            return back()->with('msgError', 'Ocurrio un error al eliminar el trabajo');
        }
    }
}
