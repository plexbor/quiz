<?php

namespace App\Services\Prize\Action\Confirm;

use App\Models\{Prize, PrizeAction};

use Auth;

class BonusType implements Strategy
{
    public function handle(Prize $prize): Prize
    {
        Auth::user()->increment('bonus', $prize->value);

        $prize->confirmed();

        $prize->action()->create(['type' => PrizeAction::INCREASED_BONUS]);

        return $prize;
    }
}
