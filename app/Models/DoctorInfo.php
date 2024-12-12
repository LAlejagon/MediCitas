<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorInfo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'consultorio', 'especialidad_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'especialidad_id', 'especialidad_id');
    }
}
