<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'users_stocks_transactions';

    protected $fillable = [
        'stock',
        'quantity',
        'total_value',
        'status'
    ];

}
