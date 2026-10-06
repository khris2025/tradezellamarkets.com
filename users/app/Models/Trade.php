<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;
      protected $fillable = [
        'order',
        'type',
        'symbol',
        'volume',
        'sl',
        'tp',
        'profit',
        'status',
        'transaction_id',
        'email',
    ];
}
