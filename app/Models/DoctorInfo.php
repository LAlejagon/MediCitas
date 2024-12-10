<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DoctorInfo extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $table = 'doctorInfo';

    protected $fillable = [
        'user_id',
        'consultorio',
        'especialidad_id',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'especialidad_id', 'especialidad_id');
    }
}