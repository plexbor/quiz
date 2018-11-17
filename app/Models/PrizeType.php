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

    const THINGS = [
        'Телефон',
        'Часы',
        'Утюг',
        'Камера',
    ];

    public static function getRandom()
    {
        return self::inRandomOrder()->first();
    }

    public function checkMoneyLimit(int $value)
    {
        return ($this->limit - $value) >= 0;
    }

    public function checkThingLimit()
    {
        return $this->limit > 0;
    }
}
