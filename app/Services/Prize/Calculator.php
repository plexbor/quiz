<?php

namespace App\Services\Prize;

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
                abort(404, 'Not found case for prize type.');
                break;
        }

        return $value;
    }
}
