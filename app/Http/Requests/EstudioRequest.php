<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EstudioRequest extends FormRequest
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
            'title' => 'required|min:3',
            'institucion' => 'required|min:3',
            'descripcion' => 'required|min:3',
            'duracion' => 'required|min:3',
            'fecha_desde_hasta' => 'required|min:3',
            'actual' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El campo Título es obligatorio.',
            'title.min' => 'El campo Título debe contener al menos :min caracteres.',
            'institucion.required' => 'El campo Institución es obligatorio.',
            'institucion.min' => 'El campo Institución debe contener al menos :min caracteres.',
            'descripcion.required' => 'El campo Descripción es obligatorio.',
            'descripcion.min' => 'El campo Descripción debe contener al menos :min caracteres.',
            'duracion.required' => 'El campo Duración es obligatorio.',
            'duracion.min' => 'El campo Duración debe contener al menos :min caracteres.',
            'fecha_desde_hasta.required' => 'El campo Fecha Desde/Hasta es obligatorio.',
            'fecha_desde_hasta.min' => 'El campo Fecha Desde/Hasta debe contener al menos :min caracteres.',
        ];
    }
}
