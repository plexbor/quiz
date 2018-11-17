<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrizeType extends Model
{
    protected $fillable = [
        'name',
        'limit',
    ];

    const MONEY = 1;
    const BONUS = 2;
    const THING = 3;
}
