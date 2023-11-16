<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|min:3|max:255',
            'apellido' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'telefono' => 'required|numeric',
            'asunto' => 'required|min:3|max:255',
            'mensaje' => 'required|min:3|max:1024',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.min' => 'El campo Nombre debe contener al menos :min caracteres.',
            'nombre.max' => 'El campo Nombre no puede contener más de :max caracteres.',

            'apellido.required' => 'El campo Apellido es obligatorio.',
            'apellido.min' => 'El campo Apellido debe contener al menos :min caracteres.',
            'apellido.max' => 'El campo Apellido no puede contener más de :max caracteres.',

            'email.required' => 'El campo Correo Electrónico es obligatorio.',
            'email.email' => 'El campo Correo Electrónico debe ser una dirección de correo válida.',
            'email.min' => 'El campo Correo Electrónico debe contener al menos :min caracteres.',
            'email.max' => 'El campo Correo Electrónico no puede contener más de :max caracteres.',

            'telefono.required' => 'El campo Teléfono es obligatorio.',
            'telefono.numeric' => 'El campo Teléfono debe ser un valor numérico.',

            'asunto.required' => 'El campo Asunto es obligatorio.',
            'asunto.min' => 'El campo Asunto debe contener al menos :min caracteres.',
            'asunto.max' => 'El campo Asunto no puede contener más de :max caracteres.',

            'mensaje.required' => 'El campo Mensaje es obligatorio.',
            'mensaje.min' => 'El campo Mensaje debe contener al menos :min caracteres.',
            'mensaje.max' => 'El campo Mensaje no puede contener más de :max caracteres.',
        ];
    }
}
