<?php

namespace App\Services\Prize\Create;

use App\Models\PrizeType;

class Calculator
{
    public function handle(PrizeType $prizeType)
    {
        switch ($prizeType->id) {
            case PrizeType::MONEY:
                $value = rand(100, 1000);
                break;

            case PrizeType::BONUS:
                $value = rand(100, 1000);
                break;

            case PrizeType::THING:
                $value = array_random(PrizeType::THINGS);
                break;

            default:
                abort(422, 'Calculator not found case for prize type: '.$prizeType->id);
                break;
        }

        return $value;
    }
}
