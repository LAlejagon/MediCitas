<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DoctorInfo extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'doctorInfo';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'consultorio',
        'especialidad_id',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'especialidad_id', 'especialidad_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}