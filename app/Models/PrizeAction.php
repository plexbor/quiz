<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrizeAction extends Model
{
    protected $fillable = [
        'prize_id',
        'type',
    ];

    const CREATED = 0;
    const SENDED_TO_BANK = 1;
    const INCREASED_BONUS = 2;
    const SENDED_TO_USER = 3;
    const DELIVERED_TO_USER = 4;

    const TYPES = [
        self::CREATED => 'Создан',
        self::SENDED_TO_BANK => 'Отправлено на счёт в банк',
        self::INCREASED_BONUS => 'Зачислено на счёт лояльности',
        self::SENDED_TO_USER => 'Отправлено пользователю',
        self::DELIVERED_TO_USER => 'Доставлено пользователю',
    ];

    public function getTypeAttribute($value)
    {
        return self::TYPES[$value];
    }
}
