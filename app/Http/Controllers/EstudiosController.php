<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudioRequest;
use App\Models\Estudios;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class EstudiosController extends Controller
{

    use WithPagination;

    public function index()
    {
        $estudios = Estudios::orderBy('created_at', 'desc')->paginate(10);
        return view('estudios.index', compact('estudios'));
    }

    public function create()
    {
        return view('estudios.create');
    }

    public function store(EstudioRequest $req)
    {
        $validated = $req->validated();
        if ($validated) {
            $estudios = new Estudios();
            $estudios->title = e($validated['title']);
            $estudios->institucion = e($validated['institucion']);
            $estudios->descripcion = $validated['descripcion'];
            $estudios->duracion = e($validated['duracion']);
            $estudios->fecha_desde_hasta = e($validated['fecha_desde_hasta']);
            if (isset($validated['actual'])) {
                $estudios->actual = true;
            }
            if ($estudios->save()) {
                return redirect('/estudios')->with('msgSuccess', 'Estudio agregado exitosamente');
            } else {
                return back()->with('msgError', 'Ocurrio un error');
            }
        }
    }

    public function edit(string $id)
    {
        $estudio = Estudios::find($id);
        if (!$estudio) {
            return redirect('/estudios')->with('msgError', 'Ocurrio un error, no se ha encontrado un estudio con ese ID');
        }
        return view('estudios.edit', compact('estudio'));
    }

    public function update(string $id, EstudioRequest $req)
    {
        $estudio = Estudios::find($id);
        if ($estudio) {
            $validated = $req->validated();
            if ($validated) {
                $estudio->title = e($validated['title']);
                $estudio->institucion = e($validated['institucion']);
                $estudio->descripcion = $validated['descripcion'];
                $estudio->duracion = e($validated['duracion']);
                $estudio->fecha_desde_hasta = e($validated['fecha_desde_hasta']);
                $estudio->actual = $validated['actual'];

                if ($estudio->save()) {
                    return redirect('/estudios')->with('msgSuccess', 'Estudio actualizado exitosamente');
                } else {
                    return back()->with('msgError', 'Ocurrio un error');
                }
            }
        } else {
            return back()->with('msgError', 'Ocurrio un error, no se ha encontrado un estudio con ese ID');
        }
    }

    public function destroy(string $id)
    {
        $estudio = Estudios::find($id);
        if ($estudio) {
            if ($estudio->delete()) {
                return redirect('/estudios')->with('msgSuccess', 'Estudio eliminado exitosamente');
            }
        } else {
            return back()->with('msgError', 'Ocurrio un error, no se ha encontrado un estudio con ese ID');
        }
    }
}
