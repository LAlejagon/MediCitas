<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $table = 'dates'; // Nombre de la tabla

    protected $primaryKey = 'date_id'; // Nombre de la clave primaria

    protected $fillable = [
        'fecha',
        'hora',
        'cedula_usuario',
        'doctor_id',
        'lugar',
        'direccion',
        'razon',
    ]; // Columnas que se pueden llenar masivamente
}
