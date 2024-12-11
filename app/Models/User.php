<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'gender',
        'age',    
        'health_history',
        'user_type',
        'password', // Agregado
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token', // Ocultar tokens
    ];

    /**
     * Define relationships (opcional).
     */
    public function dates()
    {
        return $this->hasMany(Date::class);
    }

    public function doctorInfo()
    {
        return $this->hasOne(DoctorInfo::class);
    }
}
