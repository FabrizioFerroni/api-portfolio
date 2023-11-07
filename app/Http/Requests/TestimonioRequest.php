<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonioRequest extends FormRequest
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
            'cliente'=>'required|min:3|max:255',
            'cargo'=> 'required|min:3|max:255',
            'descripcion'=> 'required|min:3|max:1024',
            'imagen'=> 'required|file'
        ];
    }

    public function messages(): array
    {
        return [
            'cliente.required' => 'El campo Cliente es obligatorio.',
            'cliente.min' => 'El campo Cliente debe contener al menos :min caracteres.',
            'cliente.max' => 'El campo Cliente no puede contener más de :max caracteres.',

            'cargo.required' => 'El campo Cargo es obligatorio.',
            'cargo.min' => 'El campo Cargo debe contener al menos :min caracteres.',
            'cargo.max' => 'El campo Cargo no puede contener más de :max caracteres.',

            'descripcion.required' => 'El campo Descripción es obligatorio.',
            'descripcion.min' => 'El campo Descripción debe contener al menos :min caracteres.',
            'descripcion.max' => 'El campo Descripción no puede contener más de :max caracteres.',

            'imagen.required' => 'El campo Imagen es obligatorio.',
            'imagen.file' => 'El campo Imagen debe ser un archivo válido.'
        ];
    }
}
