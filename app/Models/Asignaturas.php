<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaturas extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'semestre',
        'nombre',
        'cantidad_creditos',
        'docente',
        'asignatura_pre',
        'horas_aut',
        'horas_dir'
    ];
}
