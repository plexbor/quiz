<?php

namespace App\Services\Prize\Action\Confirm;

use App\Models\{Prize, PrizeAction};

use Auth;

class MoneyType implements Strategy
{
    public function handle(Prize $prize)
    {
        if ($bankAccount = Auth::user()->bank_account) {
            return $this->availableAccount($prize, $bankAccount);
        } else {
            $this->notAvailableAccount();
        }
    }

    private function availableAccount(Prize $prize, string $bankAccount)
    {
        $this->sendToBank($prize, $bankAccount);

        $prize->confirmed();

        $prize->action()->create(['type' => PrizeAction::SENDED_TO_BANK]);

        return $prize;
    }

    private function sendToBank(Prize $prize, string $bankAccount)
    {
        // send prize value to user bank account
        // Bank::setAccount($bankAccount)->setAmount($prize->value)->send()
    }

    private function notAvailableAccount()
    {
        abort(422, 'Заполните в профиле номер банковского счёта!');
    }
}
