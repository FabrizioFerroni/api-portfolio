<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class CvUPDRequest extends FormRequest
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
            'cv' => 'file',
            'actual' => 'required|boolean',
        ];
    }

    public function messages() : array {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El nombre debe tener como maximo 255 caracteres',
            'cv.file' => 'El curriculum vitae debe ser un archivo y de formato PDF',
            'actual.required' => 'El estado es requerido',
        ];
    }
}
