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
        'razon',
    ]; 

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'cedula_usuario', 'id'); 
    }

    // Relación con el modelo Doctor
    public function doctor()
    {
        return $this->belongsTo(DoctorInfo::class, 'doctor_id', 'user_id');
    }
}