<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Cambia esto
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable // Cambia Model a Authenticatable
{
    use HasFactory, Notifiable; // Agrega Notifiable para las notificaciones

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'address',
        'gender',
        'age',
        'health_history',
        'user_type',
    ];

    // El campo 'id' es auto-incrementable por defecto en MySQL
    protected $primaryKey = 'id';
    public $incrementing = false; // Cambia esto a true para que el 'id' sea auto incrementable
    public $timestamps = true;

    protected $hidden = [
        'password', // Asegúrate de ocultar la contraseña
    ];
}