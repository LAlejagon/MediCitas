<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Specialty extends Model // Cambiar a Model
{
    use HasFactory, Notifiable;

    protected $table = 'especialidades';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'especialidad_id', // Asegúrate de que este sea el nombre correcto
        'nombre', // Cambia 'name' a 'nombre'
    ];
}