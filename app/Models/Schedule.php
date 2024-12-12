<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Schedule extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'schedule';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'cita_id',
        'fecha',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function date()
    {
        return $this->belongsTo(Date::class, 'cita_id', 'cita_id');
    }
}