<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:255|same:password_confirm',
            'password_confirm' => 'required|min:6|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.min' => 'El campo Nombre debe contener al menos :min caracteres.',
            'name.max' => 'El campo Nombre no puede contener más de :max caracteres.',

            'email.required' => 'El campo Correo Electrónico es obligatorio.',
            'email.email' => 'El campo Correo Electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya ha sido registrado por otro usuario.',

            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.min' => 'El campo Contraseña debe contener al menos :min caracteres.',
            'password.max' => 'El campo Contraseña no puede contener más de :max caracteres.',
            'password.same' => 'El campo Contraseña debe coincidir con el campo Confirmar Contraseña.',

            'password_confirm.required' => 'El campo Confirmar Contraseña es obligatorio.',
            'password_confirm.min' => 'El campo Confirmar Contraseña debe contener al menos :min caracteres.',
            'password_confirm.max' => 'El campo Confirmar Contraseña no puede contener más de :max caracteres.'
        ];
    }
}
