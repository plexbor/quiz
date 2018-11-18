<?php

namespace App\Services\Prize\Action\Confirm;

use App\Models\{Prize, PrizeType};

class Confirmator
{
    public function confirm(Prize $prize)
    {
        switch ($prize->prize_type_id) {
            case PrizeType::MONEY:
                $type = new MoneyType();
                break;

            case PrizeType::BONUS:
                $type = new BonusType();
                break;

            case PrizeType::THING:
                $type = new ThingType();
                break;

            default:
                abort(422, 'Confirm action not found case for prize type: '.$prize->prize_type_id);
                break;
        }

        return $type->handle($prize);
    }
}
