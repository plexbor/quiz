<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrizeAction extends Model
{
    protected $fillable = [
        'prize_id',
        'type',
    ];

    const SENDED_TO_BANK = 1;

    const TYPES = [
        self::SENDED_TO_BANK => 'Отправлено на счёт в банк',
    ];

    public function getTypeAttribute($value)
    {
        return self::TYPES[$value];
    }
}
