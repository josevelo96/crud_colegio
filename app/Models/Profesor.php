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

    public function grados()
    {
        return $this->hasMany(Grado::class);
    }
}
