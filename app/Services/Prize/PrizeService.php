<?php

namespace App\Services\Prize;

use App\Services\Prize\Create\Manager as CreateManager;

class PrizeService
{
    protected $repository, $createManager;

    public function __construct(Repository $repository, CreateManager $createManager)
    {
        $this->repository = $repository;
        $this->createManager = $createManager;
    }

    public function list()
    {
        return $this->repository->getAll();
    }

    public function create()
    {
        return $this->createManager->definition()->create();
    }
}
