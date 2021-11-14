<?php

namespace App\Http\Requests\AlumnosGrados;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoGradoRequest extends FormRequest
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
            'alumno_id' => 'required|exists:alumnos,id',
            'grado_id' => 'required|exists:grados,id',
            'seccion' => 'required|max:150',
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
            'alumno_id.required' => 'Debe seleccionar un alumno.',
            'alumno_id.exists' => 'No existe alumno especificado.',

            'grado_id.required' => 'Debe seleccionar un grado.',
            'grado_id.exists' => 'No existe grado especificado.',

            'seccion.required' => 'El seccion es requerida.',
            'seccion.max' => 'La sección no debería rebasar los 150 caracteres',
        ];
    }
}
