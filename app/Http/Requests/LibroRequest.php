<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool { return true; }

    public function rules(): array
    {
    $libroId = $this->route('libro');

    return [
        'autor_id' => 'required|exists:autores,id',
        'titulo' => 'required|string|max:150',
        'isbn' => 'required|unique:libros,isbn,' . $libroId,
        'anio_publicacion' => 'required|integer|between:1900,' . date('Y'),
        'precio' => 'required|numeric|min:0',
    ];
    }

    public function messages(): array
    {
    return [
        'autor_id.required' => 'El autor es obligatorio.',
        'autor_id.exists' => 'El autor seleccionado no existe.',
        'titulo.required' => 'El título es obligatorio.',
        'titulo.max' => 'El título no debe superar los 150 caracteres.',
        'isbn.required' => 'El ISBN es obligatorio.',
        'isbn.unique' => 'Este ISBN ya está registrado.',
        'anio_publicacion.required' => 'El año de publicación es obligatorio.',
        'anio_publicacion.integer' => 'El año de publicación debe ser un número entero.',
        'anio_publicacion.between' => 'El año de publicación debe estar entre 1900 y el año actual.',
        'precio.required' => 'El precio es obligatorio.',
        'precio.numeric' => 'El precio debe ser un número.',
        'precio.min' => 'El precio debe ser mayor o igual a 0.',
    ];
    }

}
