<?php

namespace App\Services\Prize\Action;

use App\Services\Prize\Action\Confirm\Confirmator;

use App\Models\Prize;

class Manager
{
    public function __construct(Confirmator $confirmator)
    {
        $this->confirmator = $confirmator;
    }

    public function confirm(Prize $prize)
    {
        $this->confirmator->confirm($prize);
    }
}
