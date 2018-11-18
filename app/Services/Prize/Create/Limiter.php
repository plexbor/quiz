<?php

namespace App\Services\Prize\Create;

use App\Models\PrizeType;

class Limiter
{
    public function handle(PrizeType $prizeType, $value)
    {
        switch ($prizeType->id) {
            case PrizeType::MONEY:
                $isAllow = $prizeType->checkMoneyLimit($value);
                break;

            case PrizeType::BONUS:
                $isAllow = true;
                break;

            case PrizeType::THING:
                $isAllow = $prizeType->checkThingLimit($value);
                break;

            default:
                abort(422, 'Limiter not found case for prize type: '.$prizeType->id);
                break;
        }

        return $isAllow;
    }
}
