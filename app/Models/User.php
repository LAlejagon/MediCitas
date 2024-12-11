<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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
    public $incrementing = false; // Esto asegura que el 'id' sea auto incrementable
    public $timestamps = true;
}
