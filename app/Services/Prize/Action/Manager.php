<?php

namespace App\Services\Prize\Action;

use App\Services\Prize\Action\Confirm\Confirmator;
use App\Services\Prize\Action\Convert\Converter;
use App\Services\Prize\Action\Decline\Declinator;

use App\Models\Prize;

class Manager
{
    protected $confirmator, $converter, $declinator;

    public function __construct(
        Confirmator $confirmator,
        Declinator $declinator,
        Converter $converter
    ) {
        $this->confirmator = $confirmator;
        $this->converter = $converter;
        $this->declinator = $declinator;
    }

    public function confirm(Prize $prize): Prize
    {
        return $this->confirmator->confirm($prize);
    }

    public function convert(Prize $prize): Prize
    {
        return $this->converter->convert($prize);
    }

    public function decline(Prize $prize): Prize
    {
        return $this->declinator->decline($prize);
    }
}
