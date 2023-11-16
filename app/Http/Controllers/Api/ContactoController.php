<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactoRequest;
use App\Mail\SendMail;
use App\Mail\SendMailResponse;
use App\Models\Contacto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::all();
        return view('contact.index', compact('contactos'));
    }

    public function getById(string $id)
    {
        $contacto = Contacto::find($id);
        return response()->json($contacto, 200);
    }

    public function contacto(ContactoRequest $req)
    {
        try {
            $validated = $req->validated();
            if ($validated) {
                $nombre = $validated['nombre'];
                $apellido = $validated['apellido'];
                $email = $validated['email'];
                $telefono = $validated['telefono'];
                $asunto = $validated['asunto'];
                $mensaje = $validated['mensaje'];

                $contacto = new Contacto();

                $contacto->nombre = e($nombre);
                $contacto->apellido = e($apellido);
                $contacto->email = e($email);
                $contacto->telefono = e($telefono);
                $contacto->asunto = e($asunto);
                $contacto->mensaje = $mensaje;
                $contacto->fecha_enviado = Carbon::now();

                $data = (object) ['nombre' => $nombre];

                $data2 = (object) [
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'telefono' => $telefono,
                    'asunto' => $asunto,
                    'mensaje' => $mensaje
                ];

                Mail::to($email)->send(new SendMailResponse($data));

                $fullname = $nombre . ' ' . $apellido;
                Mail::to('hola@fabriziodev.ar')->send(new SendMail($fullname, $email, $asunto, $data2));

                $contacto->save();

                return response()->json(['message' => 'Se ha enviado con éxito el correo'], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Se ha detectado un error', 'error' => $th->getMessage()], 500);
        }
    }
}
