<?php

namespace App\Services\Prize\Action\Convert;

use App\Models\{Prize, PrizeAction, PrizeType};

class Converter
{
    public function convert(Prize $prize)
    {
        $prize->type->increment('limit', $prize->value);

        $value = $prize->value * config('prize.money.conversion_rate');

        $prize->update([
            'prize_type_id' => PrizeType::BONUS,
            'value' => $value,
            'status' => Prize::STATUS_CONVERTED,
        ]);

        $prize->action()->create(['type' => PrizeAction::CONVERTED_TO_BONUS]);

        return $prize;
    }
}
