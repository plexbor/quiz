<?php

namespace App\Services\Prize;

use App\Services\Prize\Create\Manager as CreateManager;

class PrizeService
{
    protected $createManager;

    public function __construct(CreateManager $createManager)
    {
        $this->createManager = $createManager;
    }

    public function create()
    {
        return $this->createManager->definition()->create();
    }
}
