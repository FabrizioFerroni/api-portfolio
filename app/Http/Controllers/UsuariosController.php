<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\Update\UsuarioUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Features;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('created_at', 'desc')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(UsuarioRequest $req)
    {
        $validated = $req->validated();
        if ($validated) {
            $user = new User();
            if ($validated['password'] === $validated['password_confirm']) {
                $user->name = e($validated['name']);
                $user->email = e($validated['email']);
                $user->password = bcrypt($validated['password']);
                if ($user->save()) {
                    if (Features::enabled(Features::emailVerification()) && !$user->hasVerifiedEmail()) {
                        $user->sendEmailVerificationNotification();
                    }
                    return redirect('/usuarios')->with('msgSuccess', 'Usuario agregado exitosamente');
                } else {
                    return back()->with('msgError', 'Ocurrio un error al agregar el usuario');
                }
            } else {
                return back()->with('msgError', 'Las contraseñas no coinciden');
            }
        }
    }

    public function edit(string $id)
    {

        $usuario = User::find($id);
        if (!$usuario) {
            return redirect('/usuarios')->with('msgError', 'Ocurrio un error, no se ha encontrado un usuario con ese ID');
        }

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(string $id, UsuarioUpdateRequest $req)
    {
        $usuario = User::find($id);
        if ($usuario) {
            $validated = $req->validated();
            if ($validated) {
                $usuario->name = e($validated['name']);
                $usuario->email = $usuario->email;
                if ($usuario->save()) {
                    return redirect('/usuarios')->with('msgSuccess', 'Usuario actualizado exitosamente');
                } else {
                    return back()->with('msgError', 'Ocurrio un error al actualizar el usuario');
                }
            }
        }
    }

    public function destroy(string $id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return back()->with('msgError', 'Ocurrio un error, no se ha encontrado un usuario con ese ID');
        }
        if ($usuario->delete()) {
            return redirect('/usuarios')->with('msgSuccess', 'Usuario eliminado exitosamente');
        }
    }
}
