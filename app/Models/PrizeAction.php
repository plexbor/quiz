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
    const CREATED_WITHDRAW = 7;

    const TYPES = [
        self::CREATED => 'Создан',
        self::SENDED_TO_BANK => 'Деньги отправлены на счёт в банк',
        self::INCREASED_BONUS => 'Баллы зачислены на счёт лояльности',
        self::SENDED_TO_USER => 'Предмет отправлен пользователю',
        self::DELIVERED_TO_USER => 'Предмет доставлен пользователю',
        self::DECLINED => 'Пользователь отказался от приза',
        self::CONVERTED_TO_BONUS => 'Деньги конвертированы в баллы лояльности',
        self::CREATED_WITHDRAW => 'Создан запрос на вывод денег на счёт в банк',
    ];

    public function getTypeAttribute(int $value): string
    {
        return self::TYPES[$value];
    }
}
