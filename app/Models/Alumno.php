<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'alumnos';

    protected $fillable = [
        'nombre',
        'apellidos',
        'genero',
        'fecha_nacimiento',
    ];

    /** -----------------------------------
     * Eloquent Relationships.
     * ------------------------------------ */
    
    public function alumnos_grados()
    {
        return $this->hasMany(AlumnoGrado::class);
    }

    /** -----------------------------------
     * Profesor helper methods.
     * ------------------------------------ */
    
    public function nombreCompleto($reversed = false)
    {
        return $reversed ? "{$this->apellidos} {$this->nombre}" : "{$this->nombre} {$this->apellidos}";
    }

    public function nacimiento($format = 'd/m/Y')
    {
        return \Carbon\Carbon::parse($this->fecha_nacimiento)->format($format);
    }
}
