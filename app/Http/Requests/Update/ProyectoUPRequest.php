<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoUPRequest extends FormRequest
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
            'titulo'=> 'required|min:3|max:255',
            'descripcion'=> 'required|min:3|max:1024',
            'tags'=> 'required',
            'imagen'=> 'image',
            'is_online'=> 'required|boolean',
            'is_private' => 'required|boolean',
            'url_proyecto' => 'required|url|min:3|max:255',
            'url_github' => 'required|url|min:3|max:255',
            'categoria' => 'required|in:fullstack,frontend,backend'
        ];
    }

}
