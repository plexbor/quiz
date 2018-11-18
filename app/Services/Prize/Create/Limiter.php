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
                abort(422, 'Limiter handle not found case for prize type: '.$prizeType->id);
                break;
        }

        return $isAllow;
    }

    public function decrement(PrizeType $prizeType, $value)
    {
        switch ($prizeType->id) {
            case PrizeType::MONEY:
                $prizeType->decrement('limit', $value);
                break;

            case PrizeType::BONUS:
                break;

            case PrizeType::THING:
                $prizeType->decrement('limit', 1);
                break;

            default:
                abort(422, 'Limiter reduce not found case for prize type: '.$prizeType->id);
                break;
        }
    }
}
