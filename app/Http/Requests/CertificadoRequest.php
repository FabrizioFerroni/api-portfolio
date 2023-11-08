<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificadoRequest extends FormRequest
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
            'imagen' => 'required|image',
            'certificado' => 'required|file',
            'titulo' => 'required|min:3|max:255',
            'academia' => 'required|min:3|max:255',
            'tags' => 'required',
            'rango_fecha' => 'required|min:3|max:255'
        ];
    }

    public function messages(): array{
        return [
            'certificado.required' => 'El campo Certificado es obligatorio.',
            'certificado.file' => 'El campo Certificado debe ser un archivo válido.',

            'imagen.required' => 'El campo Imagen es obligatorio.',
            'imagen.image' => 'El campo Imagen debe ser un archivo de imagen válido.',

            'titulo.required' => 'El campo Título es obligatorio.',
            'titulo.min' => 'El campo Título debe contener al menos :min caracteres.',
            'titulo.max' => 'El campo Título no puede contener más de :max caracteres.',

            'academia.required' => 'El campo Academia es obligatorio.',
            'academia.min' => 'El campo Academia debe contener al menos :min caracteres.',
            'academia.max' => 'El campo Academia no puede contener más de :max caracteres.',

            'tags.required' => 'El campo Etiquetas es obligatorio.',

            'rango_fecha.required' => 'El campo Rango de Fechas es obligatorio.',
            'rango_fecha.min' => 'El campo Rango de Fechas debe contener al menos :min caracteres.',
            'rango_fecha.max' => 'El campo Rango de Fechas no puede contener más de :max caracteres.'
        ];

    }
}
