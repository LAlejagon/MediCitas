<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DoctorInfo extends Model
{
    use HasFactory, Notifiable;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'doctorInfo';

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'consultorio',
        'especialidad_id',
    ];

    /**
     * Obtiene la especialidad asociada con el doctor.
     */
    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'especialidad_id', 'especialidad_id');
    }

    /**
     * Obtiene el usuario asociado con la información del doctor.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}