<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'email',
        'date',
        'transaction_type',
        'amount',
        'status',
        'transaction_id',
    ];
    
    use HasFactory;
}
