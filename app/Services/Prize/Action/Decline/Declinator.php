<?php

namespace App\Services\Prize\Action\Decline;

use App\Models\{Prize, PrizeAction, PrizeType};

class Declinator
{
    public function decline(Prize $prize)
    {
        switch ($prize->prize_type_id) {
            case PrizeType::MONEY:
                $prize->type->increment('limit', $prize->value);
                break;

            case PrizeType::BONUS:
                break;

            case PrizeType::THING:
                $prize->type->increment('limit', 1);
                break;

            default:
                abort(422, 'Confirm action not found case for prize type: '.$prize->prize_type_id);
                break;
        }

        $prize->declined();

        $prize->action()->create(['type' => PrizeAction::DECLINED]);

        return $prize;
    }
}
