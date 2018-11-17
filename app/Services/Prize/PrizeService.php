<?php

namespace App\Services\Prize;

class PrizeService
{
    protected $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    public function create()
    {
        return $this->manager->definition()->create();
    }
}
