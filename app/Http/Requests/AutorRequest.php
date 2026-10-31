<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool { return true; }

    public function rules(): array
    {
    $autorId = $this->route('autore'); // Detecta el parámetro ID en rutas de actualización

    return [
        'nombres' => 'required|string|max:100',
        'nacionalidad' => 'required|string',
        'email' => 'required|email|unique:autores,email,' . $autorId,
    ];
    }

    public function messages(): array
    {
    return [
        'nombres.required' => 'El nombre es obligatorio.',
        'nombres.max' => 'El nombre no debe superar los 100 caracteres.',
        'nacionalidad.required' => 'La nacionalidad es obligatoria.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'El formato del correo electrónico no es válido.',
        'email.unique' => 'Este correo electrónico ya está registrado.',
    ];
    }

}
