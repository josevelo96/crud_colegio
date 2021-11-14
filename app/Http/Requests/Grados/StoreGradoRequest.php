<?php

namespace App\Http\Requests\Grados;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradoRequest extends FormRequest
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
            'profesor_id' => 'required|exists:profesores,id',
            'nombre' => 'required|max:30',
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
            'profesor_id.required' => 'Debe asignar el grado a un profesor.',
            'profesor_id.exists' => 'No existe profesor especificado.',

            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre no debería rebasar los 30 caracteres',
        ];
    }
}
