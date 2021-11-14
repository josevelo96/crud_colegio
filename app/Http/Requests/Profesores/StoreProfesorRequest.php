<?php

namespace App\Http\Requests\Profesores;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfesorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:150',
            'genero' => 'required|in:masculino,femenino,otro',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre no debería rebasar los 100 caracteres',

            'apellidos.required' => 'Por favor proporcione los apellidos.',
            'apellidos.max' => 'Los apellidos rebasan el máximo de 150 caracteres.',

            'genero.required' => 'Requerimos que proporcione el género',
            'genero.in' => 'Seleccione si es género femenino, masculino u otro.',
        ];
    }
}
