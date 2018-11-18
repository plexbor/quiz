<?php

namespace App\Services\Prize\Action\Confirm;

use App\Models\{Prize, PrizeAction};

use Auth;

class ThingType implements Strategy
{
    public function handle(Prize $prize)
    {
        if ($address = Auth::user()->address) {
            return $this->availableAddress($prize, $address);
        } else {
            $this->notAvailableAddress();
        }
    }

    private function availableAddress(Prize $prize, string $address)
    {
        $prize->confirmed();

        $prize->action()->create(['type' => PrizeAction::SENDED_TO_USER]);

        return $prize;
    }

    private function notAvailableAddress()
    {
        abort(422, 'Заполните в профиле адрес доставки!');
    }
}
