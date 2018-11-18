<?php

namespace App\Services\Prize\Action\Confirm;

use App\Models\Prize;

interface Strategy
{
    public function handle(Prize $prize);
}
