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
    const INCREASED_BONUS = 2;

    const TYPES = [
        self::SENDED_TO_BANK => 'Отправлено на счёт в банк',
        self::INCREASED_BONUS => 'Зачислено на счёт лояльности',
    ];

    public function getTypeAttribute($value)
    {
        return self::TYPES[$value];
    }
}
