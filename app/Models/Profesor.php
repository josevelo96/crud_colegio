<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profesor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profesores';

    protected $fillable = [
        'nombre',
        'apellidos',
        'genero',
    ];

    /** -----------------------------------
     * Eloquent Relationships.
     * ------------------------------------ */
    
    public function grados()
    {
        return $this->hasMany(Grado::class);
    }

    /** -----------------------------------
     * Profesor helper methods.
     * ------------------------------------ */

    public function nombreCompleto($reversed = false)
    {
        return $reversed ? "{$this->apellidos} {$this->nombre}" : "{$this->nombre} {$this->apellidos}";
    }
}
