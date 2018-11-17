<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    protected $fillable = [
        'user_id',
        'prize_type_id',
        'value',
        'status',
    ];

    const STATUS_CREATED = 1;
}
