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
    const DECLINED = 5;
    const CONVERTED_TO_BONUS = 6;

    const TYPES = [
        self::CREATED => 'Создан',
        self::SENDED_TO_BANK => 'Отправлен на счёт в банк',
        self::INCREASED_BONUS => 'Зачислен на счёт лояльности',
        self::SENDED_TO_USER => 'Отправлен пользователю',
        self::DELIVERED_TO_USER => 'Доставлен пользователю',
        self::DECLINED => 'Отказан',
        self::CONVERTED_TO_BONUS => 'Конвертирован в баллы лояльности',
    ];

    public function getTypeAttribute($value)
    {
        return self::TYPES[$value];
    }
}
