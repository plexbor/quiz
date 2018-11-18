<?php

namespace App\Services\Prize\Action\Confirm;

use App\Models\{Prize, PrizeAction, Withdraw};

use Auth;

class MoneyType implements Strategy
{
    public function handle(Prize $prize): Prize
    {
        if ($bankAccount = Auth::user()->bank_account) {
            return $this->availableAccount($prize, $bankAccount);
        } else {
            $this->notAvailableAccount();
        }
    }

    private function availableAccount(Prize $prize, string $bankAccount): Prize
    {
        $this->createWithdraw($prize, $bankAccount);

        $prize->confirmed();

        $prize->action()->create(['type' => PrizeAction::CREATED_WITHDRAW]);

        return $prize;
    }

    private function createWithdraw(Prize $prize, string $bankAccount): void
    {
        Withdraw::create([
            'prize_id' => $prize->id,
            'bank_account' => $bankAccount,
            'amount' => $prize->value,
            'status' => Withdraw::STATUS_CREATED,
        ]);
    }

    private function notAvailableAccount()
    {
        abort(422, 'Заполните в профиле номер банковского счёта!');
    }
}
