<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumnoGrado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'alumnos_grados';

    protected $fillable = [
        'alumno_id',
        'grado_id',
        'seccion',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
}
