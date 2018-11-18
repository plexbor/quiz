<?php

namespace App\Services\Prize\Action;

use App\Services\Prize\Action\Confirm\Confirmator;
use App\Services\Prize\Action\Decline\Declinator;

use App\Models\Prize;

class Manager
{
    public function __construct(Confirmator $confirmator, Declinator $declinator)
    {
        $this->confirmator = $confirmator;
        $this->declinator = $declinator;
    }

    public function confirm(Prize $prize)
    {
        return $this->confirmator->confirm($prize);
    }

    public function decline(Prize $prize)
    {
        return $this->declinator->decline($prize);
    }
}
