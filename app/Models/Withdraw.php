<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'prize_id',
        'bank_account',
        'amount',
        'status',
    ];

    const STATUS_CREATED = 1;
    const STATUS_COMPLETED = 2;
    const STATUS_CANCELLED = 3;
}
