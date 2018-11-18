<?php

namespace App\Services\Prize\Action;

use App\Models\{Prize, PrizeType};

class Manager
{
    public function confirm(Prize $prize)
    {
        switch ($prize->prize_type_id) {
            case PrizeType::MONEY:
                // code...
                break;

            case PrizeType::BONUS:
                // code...
                break;

            case PrizeType::THING:
                // code...
                break;

            default:
                abort(422, 'Confirm action not found case for prize type: '.$prize->prize_type_id);
                break;
        }
    }
}
