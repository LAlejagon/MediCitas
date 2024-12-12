<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Specialty extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'especialidades'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'especialidad_id'; // Clave primaria

    /**
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'especialidad_id',
        'nombre', 
    ];
}
