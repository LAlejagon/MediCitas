<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'issue_date',
        'customer_name',
        'customer_id',
        'details',
        'total',
        'signature',
    ];

    protected $casts = [
        'details' => 'array', // Para asegurarnos de que 'details' se maneja como un array
    ];
}
